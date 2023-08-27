<?php
session_start();
//echo($_SESSION['user'] . ' ' . $_SESSION['password']);
include __DIR__ . '/../include/Access_functions.php';

try {
    include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        IsLogged($pdo);
        
	} else {
        header('location: access.php');
    }

    include __DIR__ . '/../include/Meli_functions.php';
	
    if (isset($_POST['select_list'])) {
        
        $list = $_POST['select_list']['list'];
        $packets_list = findSeveral($pdo,'listasenvios','id_list',$list);
        $cadete = $_POST['select_list']['cadete'];
        $today = new DateTime();
        $today->modify('-3 hours');
        $today_text = $today->format('Y-m-d h:i:s');
        
        $array_assign = [];
        for ($i = 0; $i < count($packets_list) ; $i++ ) {
            $array_assign[$i]['id_ship'] = $packets_list[$i]['id_ship'];
            $array_assign[$i]['cadete'] = $cadete;
            $array_assign[$i]['updated_at'] = $today_text;
        }
        
        update_by_lots ($pdo, 'envios', 'id_ship', $array_assign);
    
        $title='Asignación de paquetes';
        //////////////////////////////////////
        ob_start();
        
        ?>

        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <link rel="stylesheet" href="./Styles/assign_packets.css">
        
        <?php
            
        $inc_head = ob_get_clean();
        ///////////////////////////////////////
        
        ob_start();
        
        ?>

        <div class="presentacion">
          <div id="respuesta"><h2>Se asignaron los paquetes con éxito</h2></div>
        </div>
        
        <?php
            
        $output = ob_get_clean();
        ///////////////////////////////////////
        $inc_script_end = '<!*********************************************************************>';
        //////////////////////////////////////
        
	} elseif (isset($_POST['select_scanner'])) {
        
        $packets_list = $_POST['select_scanner']['values'];
        $packets_list = json_decode($packets_list,true);
        $cadete = $_POST['select_scanner']['cadete'];
        $today = new DateTime();
        $today->modify('-3 hours');
        $today_text = $today->format('Y-m-d h:i:s');
        
        $array_assign = [];
        for ($i = 0; $i < count($packets_list) ; $i++ ) {
            $array_assign[$i]['id_ship'] = $packets_list[$i];
            $array_assign[$i]['cadete'] = $cadete;
            $array_assign[$i]['updated_at'] = $today_text;
        }
        
        update_by_lots ($pdo, 'envios', 'id_ship', $array_assign);
    
        //////////////////////////////////////
        $title='Asignación de paquetes';
        
        ob_start();
        
        ?>

        <div class="presentacion">
          <div id="respuesta"><h2>Se asignaron los paquetes con éxito</h2></div>
        </div>
        
        <?php
            
        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" href="./Styles/assign_packets.css">
        <script type="text/javascript" src="./js/instascan.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/assign_packets.js"></script>

        <?php

        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        //////////////////////////////////////
        
	} else {
        $title='Asignar envíos a cadete';
        
        $listas = findAll($pdo,'listas');
        $cadetes = findSeveral($pdo,'cadetes','status',1);
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" href="./Styles/assign_packets.css">
        <script type="text/javascript" src="./js/instascan.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/assign_packets.js"></script>

        <?php

        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_assign_packets.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////    
        $inc_script_end = '<!*********************************************************************>';
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';