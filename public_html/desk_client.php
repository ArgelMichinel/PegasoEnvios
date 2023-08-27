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
    
    //echo($_SESSION['user'] . ' ' . $_SESSION['password'] . PHP_EOL);
    
    include __DIR__ . '/../include/Meli_functions.php';
    $title='Escritorio Pegaso Envios';
	
    ob_start();
    ?>

    <link rel="stylesheet" type="text/css" href="./Styles/desk_client.css">
    <script type="text/javascript" language="javascript" src="./js/desk_client.js"></script>
    <?php

    $inc_head = ob_get_clean();
    ///////////////////////////////////////////////////////////////////////////////////
    ob_start();

    include __DIR__ . '/../Templ/out_desk_client.html.php';

    $output = ob_get_clean();
    ///////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////
    $inc_script_end = '<!*******************************>';

} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout3.html.php';