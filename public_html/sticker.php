<?php

use Mpdf\HTMLParserMode;

session_start();
try {

    include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        include __DIR__ . '/../include/Access_functions.php';
        
        IsLogged_client($pdo);
        
	} else {
        header('location: desk_client.php');
    }

    include __DIR__ . '/../include/Meli_functions.php';
    print_r($_GET);
    
    if (isset($_GET['packet'])) {

        $packet_num = htmlspecialchars($_GET['packet']);
        //print_r($_SESSION);

        $packet = findById($pdo,'Pegaso_envios','id_ship',$packet_num);

        $sender_id = $_SESSION['user_id'];
        $ACCESS_TOK = $_SESSION['access_tok'];
        $client = info_user($pdo,$sender_id);
        //print_r($packet['sender_id']);

        /*if ($sender_id != $packet['sender_id']) {
            die('Credenciales inválidas.');
        }*/

        $fields = ['id_ship'=> $packet_num,
                    'impreso' => '1'
                    ];

        update($pdo, 'Pegaso_envios', 'id_ship', $fields);

        $title='Etiqueta de envío';
        
        
        require_once __DIR__ . '/../Templ/sticker.html.php';
        //$css2 = file_get_contents('Styles/H-styles.css');
        $css3 = file_get_contents('Styles/sticker.css');

        require_once __DIR__ . '/../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($css3,HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($remito,HTMLParserMode::HTML_BODY);
        $mpdf->Output();
        
    } 

} catch (PDOException $e) {
    echo ('Usuario no resgistrado ' . $e);
}




//include __DIR__ . '/../Templ/sticker.html.php';