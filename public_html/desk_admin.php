<?php
session_start();
//echo($_SESSION['user'] . ' ' . $_SESSION['password'] . PHP_EOL);

try {
    include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        include __DIR__ . '/../include/Access_functions.php';
        
        IsLogged($pdo);
        
	} else {
        header('location: access.php');
    }
    
    $title = 'Pegaso envios admin';
    ob_start();
    include __DIR__ . '/../Templ/home.html.php';
    $output = ob_get_clean();
    $inc_script_end = '<!****************>';
    $inc_head = '<link rel="stylesheet" href="./Styles/home.css">';
    
} catch (PDOException $e) {

	echo ('Problema con la BD o la clave ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';