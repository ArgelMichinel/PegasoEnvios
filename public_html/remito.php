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
    
    if (isset($_POST['packete'])) {

        $packets = json_decode($_POST['packete'], true);

        $num_pack = count($packets);

        $sender_id = $_SESSION['user_id'];
        $ACCESS_TOK = $_SESSION['access_tok'];

        $cliente = findById($pdo,'access','user_id',$sender_id);
        $title='Orden de envío';
        
        $date = new DateTime();
        //print_r( $cliente);
        
    } 

} catch (PDOException $e) {
    echo ('Usuario no resgistrado ' . $e);
}


require_once __DIR__ . '/../Templ/remito.html.php';
//$css1 = file_get_contents('Styles/bootstrap.min.css');
//$css2 = file_get_contents('Styles/H-styles.css');
$css3 = file_get_contents('Styles/remito.css');

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css3,HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($remito,HTMLParserMode::HTML_BODY);
$mpdf->Output();


//include __DIR__ . '/../Templ/remito.html.php';