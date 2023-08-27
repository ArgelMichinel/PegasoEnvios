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
    
    
    if (isset($_GET['shipnum'])) {

        include __DIR__ . '/../include/Meli_functions.php';

        $shipnum = $_GET['shipnum'];
        if ($shipnum[0] === 'p') {
        
            $packets = findByID($pdo,'Pegaso_envios','id_ship',$shipnum);
            $sender_id = $_SESSION['user_id'];

            if ($_SESSION['user_id'] != $packets['sender_id']) {
                die('Credenciales inválidas.');
            }

            $info_pack = '[["' . $packets['id_ship'] . '",{"date":"' . $packets['date_in'] . '","timezone_type":3,"timezone":"UTC"},"ready_to_ship",' .
                            $sender_id. ',' .$packets['order_id']. '],["' .$packets['street_name']. '","' .
                            $packets['street_number']. '","' .$packets['comment']. '","' .$packets['zip_code']. '","' .
                            $packets['city']. '","' .$packets['state']. '","Argentina",' .$packets['Latit']. ',' .$packets['Longit'].
                            ',"2021-01-22T03:25:57Z"],["' .$packets['receiver_name']. '","' .$packets['receiver_phone'].
                            '"],["' .$packets['description']. '","20.0x45.0x56.0,12000.0"],[null,null,null]]';
            
            $ship_mat = rawurlencode( $info_pack);

            echo ($ship_mat);

        } else {

            $sender_id = $_SESSION['user_id'];
            $ACCESS_TOK = $_SESSION['access_tok'];

            $shipnum = (int)$_GET['shipnum'];

            $ship_mat = print_answer ($shipnum, $ACCESS_TOK, $sender_id);

            $ship_mat = rawurlencode( json_encode($ship_mat));

            echo ($ship_mat);
        }
        //////////////////////////////////////////////////

    } 
} catch (PDOException $e) {

	echo ('Problema con la BD o la clave ' . $e);
}
