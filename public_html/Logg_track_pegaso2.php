<?php
session_start();
try {

    $data = json_decode(file_get_contents('php://input'), true);
    echo($data);

    if ((isset($data['location']['extras']['email'])) && (isset($data['location']['extras']['password'])) ) {

        $email = htmlspecialchars($data['location']['extras']['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($data['location']['extras']['password'], ENT_QUOTES, 'UTF-8');

        //print_r($_POST);
        include __DIR__ . '/../include/DatabaseConnection.php';
        
        include __DIR__ . '/../include/Access_functions.php';
            
        $pegaso = Logg_pegaso($pdo,$email,$password);
        //print_r($email);
        

        include __DIR__ . '/../include/Meli_functions.php';

        $parameters['Lati1'] = $data['location']['coords']['latitude'];
        $parameters['Longi1'] = $data['location']['coords']['longitude'];
        $fecha_dummy = new DateTime();
        $fecha_dummy->modify('-3 hours');
        $parameters['Tiempo1'] = $fecha_dummy;
        $parameters['num_cadete'] = $pegaso['num_cadete'];
        //print_r($parameters);

        record_track_pe($pdo, $parameters);

        echo('Exitoso');
        //print_r($_POST);

    }
	
        
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}