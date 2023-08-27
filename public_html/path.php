<?php
session_start();
try {
    include __DIR__ . '/../include/DatabaseConnection.php';
    include __DIR__ . '/../include/Access_functions.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        IsLogged($pdo);
        
	} else {
        header('location: index.php');
    }
    
    include __DIR__ . '/../include/Datosprogram.php';

    $cURLConnection = curl_init();

    $headers_req =array(
        'GET' => 'application/json',
        'Access-Control-Allow-Origin' => '*'
     );

     /* Ayuda en la pagina https://developers.google.com/maps/documentation/directions/get-directions */

    curl_setopt($cURLConnection, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/directions/json?origin=-34.6247551,-58.3813476&destination=-34.5861,-58.4038&key=' . $Google_Key);
    curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers_req);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $phoneList = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    ob_start();
    
        print('<pre>');
        print_r ($phoneList);
        print('</pre>');
    
    $output = ob_get_clean();
    
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}

$title = 'Ruta';
$inc_script_end = '<!*******************************>';
$inc_head = '<!*******************************>';

include __DIR__ . '/../Templ/layout2.html.php';
