<?php
session_start();
try {
    
    include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        include __DIR__ . '/../include/Access_functions.php';
        
        IsLogged($pdo);
        
	} else {
        header('location: index.php');
    }
    
    include __DIR__ . '/../include/Meli_functions.php';
    
    $data = json_decode(file_get_contents('php://input'), true);
    //print_r( $data);
    
    $n_data = count($data);
    
    $fields=[];
        
    switch ($data[1][6]) {
        case "Argentina":
        $pais = 1;
        break;
        case "Brasil":
        $pais = 2;
        break;
        case "Chile":
        $pais = 3;
        break;
        case "Perú":
        $pais = 4;
        break;
        case "Venezuela":
        $pais = 5;
        break;
        default:
        $pais = 1;
    }
    
    if ($data[4][0]==NULL) {
        $f_first_visita = NULL;
    } else {
        $f_first_visita = new DateTime(substr($data[4][0], 0, 19));
    }

    if ($data[4][1]==NULL) {
        $f_delivered = NULL;
    } else {
        $f_delivered = new DateTime(substr($data[4][1], 0, 19));
    }

    if ($data[4][2]==NULL) {
        $f_not_delivered = NULL;
    } else {
        $f_not_delivered = new DateTime(substr($data[4][2], 0, 19));
    }
    
    $colum = [];
    $colum['id_ship'] = $data[0][0];
    $fecha_dummy = new DateTime($data[0][1]['date']);
    $fecha_dummy->modify('-3 hours');
    $colum['date_in'] = $fecha_dummy;
    $colum['status'] = $data[0][2];
    $colum['sender_id'] = $data[0][3];
    $colum['order_id'] = $data[0][4];
    $colum['street_name'] = $data[1][0];
    $colum['street_number'] = intval ($data[1][1]);
    $colum['comment'] = $data[1][2];
    $colum['zip_code'] = intval ($data[1][3]);
    $colum['city'] = $data[1][4];
    $colum['state'] = $data[1][5];
    $colum['country'] = $pais;
    $colum['Latit'] = $data[1][7];
    $colum['Longit'] = $data[1][8];
    $colum['receiver_name'] = $data[2][0];
    $colum['receiver_phone'] = $data[2][1];
    $colum['description'] = $data[3][0];
    $colum['date_first_visit'] = $f_first_visita;
    $colum['date_delivered'] = $f_delivered;
    $colum['date_not_delivered'] = $f_not_delivered;
    $colum['updated_at'] = $fecha_dummy;
    
    $fields = $colum;
    
    insert($pdo, 'envios', $fields);
    
    echo("Exito");
    
} catch (PDOException $e) {

    echo("Error" . $e);
}
?>