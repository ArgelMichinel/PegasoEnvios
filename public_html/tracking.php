<?php
session_start();
try {

    include __DIR__ . '/../include/DatabaseConnection.php';
	include __DIR__ . '/../include/Meli_functions.php';
    
    include __DIR__ . '/../include/Access_functions.php';
	
    if (isset($_GET['track_id'])) {
        
        $title='Rastreo de envíos';
        $track_pack = htmlspecialchars($_GET['track_id'], ENT_QUOTES, 'UTF-8');
        $data_pack = findById($pdo,"envios","id_ship",$track_pack);
        $today = new DateTime();
        $today->modify('-3 hours');
        $today_milis = strtotime($today->format('Y-m-d'));
        $packet_milis = strtotime($data_pack['updated_at']);
        $clients = findAll($pdo,"access");
        //print_r($data_pack);
        /*
        $pack_status = 0; "Envio entregado"
        $pack_status = 1; "Envio Sede, sin asignar a cadete"
        $pack_status = 2; "Envio localizado con coordenadas"
        $pack_status = 3; "Envio Sede, está asignado pero el cadete no lo ha recogido o no ha activado la app"
        $pack_status = 4; "Envio Sede. Se considera en sede porque no fue asignado hoy"
        $pack_status = 5; "No está en DB"
        */
        
        if (isset($data_pack['status'])) {  //Condicional que evalúa si el paquete existe en la BD

            if ($data_pack['id_ship'][0] === 'p') { //Evalúa si es un paquete de Pegaso o MELI

                $packets = [];
                $packets['id_ship'] = $data_pack['id_ship'];
                $packets['status'] = $data_pack['status'];
                $packets['sender_id'] = $data_pack['sender_id'];
                $packets['order_id'] = $data_pack['order_id'];
                $packets['street_name'] = $data_pack['street_name'];
                $packets['street_number'] = $data_pack['street_number'];
                //$packets['comment'] = $data_pack['comment'];
                $packets['zip_code'] = $data_pack['zip_code'];
                $packets['city'] = $data_pack['city'];
                $packets['state'] = $data_pack['state'];
                $packets['country'] = 'Argentina';
                $packets['latit'] = $data_pack['Latit'];
                $packets['longit'] = $data_pack['Longit'];
                //$packets['receiver_name'] = $data_pack['Longit'];
                //$packets['dimensions'] = $data_pack['dimensions'];
                $packets['date_first_visit'] = $data_pack['date_first_visit'];
                $packets['date_delivered'] = $data_pack['date_delivered'];
                $packets['date_not_delivered'] = $data_pack['date_not_delivered'];
                
            } else {
                
                $sender_id = $data_pack['sender_id'];
                $shipnum = $data_pack['id_ship'];

                $dat_user = checkValdTok($pdo,$sender_id);
                $cadete = $data_pack['cadete'];
                
                $ship_mat = print_answer ($shipnum,$dat_user['access_tok'], $sender_id);
                usleep(10*10000);

                $packets = [];
                $packets['id_ship'] = $ship_mat[0][0];
                $packets['status'] = $ship_mat[0][2];
                $packets['sender_id'] = $ship_mat[0][3];
                $packets['order_id'] = $ship_mat[0][4];
                $packets['street_name'] = $ship_mat[1][0];
                $packets['street_number'] = $ship_mat[1][1];
                //$packets['comment'] = $ship_mat[1][2];
                $packets['zip_code'] = $ship_mat[1][3];
                $packets['city'] = $ship_mat[1][4];
                $packets['state'] = $ship_mat[1][5];
                $packets['country'] = $ship_mat[1][6];
                $packets['latit'] = $ship_mat[1][7];
                $packets['longit'] = $ship_mat[1][8];
                //$packets['receiver_name'] = $ship_mat[2][0];
                $packets['dimensions'] = $ship_mat[3][1];
                $packets['date_first_visit'] = $ship_mat[4][0];
                $packets['date_delivered'] = $ship_mat[4][1];
                $packets['date_not_delivered'] = $ship_mat[4][2];



            }
            
            if ($packets['status'] == 'delivered') {  //Condicional que evalúa si el paquete fue entregado ya
                $pack_status = 0;
                $pack_locat = [$packets['latit'], $packets['longit']];
            } else {
                if ($packet_milis > $today_milis) {  //Condicional que evalúa si el paquete fue ingresado o asignado hoy

                    if ($cadete == '') {  //Condicional que evalúa si el paquete fue asignado a cadete
                        $pack_status = 1; //Está en sede porque el envío no ha sido asignado
                        $pack_locat = ['-34.6247551', '-58.3813476'];
                    } else {
                        $cadete = findById($pdo,"cadetes","num_cadete",$cadete);
                        $time_cadete_milis = strtotime($cadete['Tiempo1']);
                        
                        if ($time_cadete_milis > $today_milis) {
                            $pack_locat = [$cadete['Lati1'], $cadete['Longi1']];
                            $pack_status = 2;
                        } else {
                            $pack_locat = ['-34.6247551', '-58.3813476'];
                            $pack_status = 3;
                        }
                        
                    }
                } else {
                    $pack_status = 4; //Se considera en sede porque no fue asignado hoy
                    $pack_locat = ['-34.6247551', '-58.3813476'];
                }
            }

        } else {
            $pack_status = 5; // No está en la BD
        }
        
        if ($pack_status < 5) {
            ///////////////////////////////////////////////////////////////////////////////////
            ob_start();
            ?>

            <link rel="stylesheet" type="text/css" href="./Styles/tracking_success.css">

            <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
            <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
            <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
            <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
            <script src="./js/leaflet.js"></script>
            <link rel="stylesheet" href="./Styles/leaflet.css" />
            <script type="text/javascript" class="init">
                $(document).ready(function() {
                    $('#example').DataTable( {
                        dom: 'Blfrtip',
                        //"lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                        "pageLength": 25,
                        "ordering": false
                    } );
                } );
            </script>

            <?php
            $inc_head = ob_get_clean();
            ///////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////
            ob_start();

            include __DIR__ . '/../Templ/out_tracking_success.html.php';

            $output = ob_get_clean();

        } else {
            ///////////////////////////////////////////////////////////////////////////////////
            ob_start();
            ?>

            <link rel="stylesheet" type="text/css" href="./Styles/tracking.css">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">

            <?php
            $inc_head = ob_get_clean();
            ///////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////

            ob_start();

            include __DIR__ . '/../Templ/out_tracking_fail.html.php';

            $output = ob_get_clean();

        }
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////
        
	} else {
        $title='Tracking de envios';

        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" type="text/css" href="./Styles/tracking.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        include __DIR__ . '/../Templ/out_tracking.html.php';
        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////
		
	}
} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout4.html.php';