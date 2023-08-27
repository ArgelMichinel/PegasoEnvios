<?php
////////////////////////
function save_location ($pdo,$location,$pegaso) {

    $parameters['Lati1'] = $location[0];
    $parameters['Longi1'] = $location[1];
    $fecha_dummy = new DateTime();
    $fecha_dummy->modify('-3 hours');
    $parameters['Tiempo1'] = $fecha_dummy;
    $parameters['num_cadete'] = $pegaso['num_cadete'];
    //print_r($parameters);

    record_track_pe($pdo, $parameters);
}
////////////////////////

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

        $location = [htmlspecialchars($_POST['Lati'], ENT_QUOTES, 'UTF-8'),  htmlspecialchars($_POST['Longi'], ENT_QUOTES, 'UTF-8')];
 
        include __DIR__ . '/../include/Meli_functions.php';
        save_location ($pdo,$location,$pegaso);

        $New_query = [];
        $New_query['incl_cadete'] = true;
        $New_query['incl_update'] = True;
        $fecha = new DateTime();  $fecha = $fecha->modify('-3 hour');
        $fecha2 = new DateTime();  $fecha2 = $fecha2->modify('-3 hour');
        $fecha2 = $fecha2->modify('+1 day');
        $New_query['cadete'] = $pegaso['num_cadete'];
        $New_query['begin_update'] = $fecha->format('Y-m-d');
        $New_query['end_update'] = $fecha2->format('Y-m-d');
        $New_query['incl_no_delivered'] = true;

        $assigned_packets = query_customized($pdo,$New_query);

        $num_pack = count($assigned_packets);

        if ($num_pack > 0) {
            $direction = [];

            //Crea matriz con coordenadas de paquetes y distancia (calculando el cuadrado de latit y longit)
            foreach ($assigned_packets as $key => $value) {
                $direction[] = [$value['Latit'],  $value['Longit'],   (pow((((float) $value['Latit']) - ((float) $location[0]) ),2) + pow((((float) $value['Longit']) - ((float) $location[1]) ),2))];
            }

            //Ordena la matriz de dirección de menor a mayor
            usort($direction, function($a, $b) {
                return $a[2] <=> $b[2];
            });
            
            require_once __DIR__ . '/../include/Datosprogram.php';
    
            //Subrutina para solicitar información del itinerario (ruta)
            $Route = find_path($location, $direction, $num_pack, $Google_Key);
            
            //print_r(json_decode($Route,true));
            $Route = json_decode($Route,true);
            $Polilinea = $Route['routes'][0]['overview_polyline']['points'];

            $response = [$direction, $Polilinea];
            $response = rawurlencode( json_encode($response));

            echo ($response);
        } else {
            $response = 'No hay ruta para hoy';
            $response = rawurlencode( json_encode($response));

            echo ($response);
        }
     }
	
        
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}