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
    
    include __DIR__ . '/../include/Meli_functions.php';
	
    delete($pdo, 'envios', 'id_ship', '40360024166' );
    delete($pdo, 'envios', 'id_ship', '40319902346' );
    delete($pdo, 'envios', 'id_ship', '40360033575' );
    delete($pdo, 'envios', 'id_ship', 'p3605392' );
    echo ('Exitoso');

} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}
sleep(2);
header('location: index.php');