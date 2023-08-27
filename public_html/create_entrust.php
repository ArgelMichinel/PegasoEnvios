<?php
session_start();

header( 'Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

try {

    include __DIR__ . '/../include/DatabaseConnection.php';
	include __DIR__ . '/../include/Meli_functions.php';
    
    include __DIR__ . '/../include/Access_functions.php';
	
    if (isset($_POST['new_entrust'])) {
        
        $new_entrust = $_POST['new_entrust'];
        
        $bande = 1; // indica que el envío ya existe
        
        
        $bande = 0;
        $today = new DateTime();
        $today->modify('-3 hours');
        $today_text = $today->format('Y-m-d h:i:s');
        $new_entrust['date_in'] = $today_text;
        $new_entrust['updated_at'] = $today_text;
        $new_entrust['country'] = 1;
        $new_entrust['impreso'] = false;
        $new_entrust['cargado'] = false;
        
            
        while ($bande == 0 ) {
            $num_envio= 'p' . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
            $new_entrust ['id_ship']= $num_envio;
            
            $envio = findById($pdo, 'envios', 'id_ship', $num_envio);
            if ( !isset($envio['receiver_name']) ) {
                $bande = 1;
            }
        }
         
        save($pdo, 'Pegaso_envios', 'id_ship', $new_entrust);

        $title='Envío creado';
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link href="css/animate2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./fonts/font-awesome.min.css">
        <link rel="stylesheet" href="./Styles/create_entrust.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        include __DIR__ . '/../Templ/out_entrust_success.html.php';
        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <script>
            var mensaje= document.getElementById('redirect_text');
            var inter = 3;
            setInterval(function(){ 
                if (inter == 0) {
                    window.location.href = "https://www.pegasoenvios.com";
                } else {
                    mensaje.innerHTML = 'Será redirigido en ' + inter + 's.';
                    --inter;
                }
             }, 1000);
        </script>

        <?php
        $inc_script_end = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        
	} else {
        $clients = findAll($pdo,"access");
        $title='Crear Envío';

        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link href="css/animate2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./fonts/font-awesome.min.css">
        <link rel="stylesheet" href="./Styles/create_entrust.css">
        <link rel="stylesheet" href="./Styles/loader.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./Styles/leaflet.css" />
        <script src="./js/leaflet.js"></script>
        <script type="text/javascript" src="./js/jquery-3.5.1.js"></script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        include __DIR__ . '/../Templ/out_create_entrust.html.php';
        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<script type="text/javascript" src="./js/create_entrust.js"></script>';
        ///////////////////////////////////////////////////////////////////////////////////
		
	}
} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout4.html.php';