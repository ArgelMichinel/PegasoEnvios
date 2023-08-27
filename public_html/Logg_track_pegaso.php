<?php
session_start();
try {

    if ((isset($_POST['email'])) && (isset($_POST['password'])) ) {

        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

        //print_r($_POST);
        include __DIR__ . '/../include/DatabaseConnection.php';
        
        include __DIR__ . '/../include/Access_functions.php';
            
        $pegaso = Logg_pegaso($pdo,$email,$password);
        //print_r($email);

        include __DIR__ . '/../include/Meli_functions.php';

        $parameters['Lati1'] = $_POST['Lati'];
        $parameters['Longi1'] = $_POST['Longi'];
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