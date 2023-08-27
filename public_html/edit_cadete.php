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
	
    $title='Editar Cadete';
    
    $cadetes = findAll($pdo,"cadetes");

    ///////////////////////////////////////////////////////////////////////////////////

    $inc_head = '<link rel="stylesheet" href="./Styles/regis_cadete.css">';
    ///////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////
    ob_start();

    include __DIR__ . '/../Templ/out_edit_cadete.html.php';

    $output = ob_get_clean();
    ///////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////    
    $inc_script_end = '<!****************>';
    ///////////////////////////////////////////////////////////////////////////////////
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';