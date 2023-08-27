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
    
    $title='Ingresar Paquetes';
    
    
    ///////////////////////////////////////////////////////////////////////////////////
    ob_start();
    ?>

    <script type="text/javascript" src="./js/instascan.min.js"></script>
    <script type="text/javascript" src="./js/prepare_QRdata.js"></script>
    <link rel="stylesheet" href="./Styles/incl_packets.css">
       
    <?php
    
    $inc_head = ob_get_clean();
    ///////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////
    ob_start();
    
    include __DIR__ . '/../Templ/out_incl_packets.html.php';
    
    $output = ob_get_clean();
    ///////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////    
    $inc_script_end = '<script type="text/javascript" src="./js/app.js"></script>';
    ///////////////////////////////////////////////////////////////////////////////////

} catch (PDOException $e) {
    echo ('Usuario no resgistrado ' . $e);
}


include __DIR__ . '/../Templ/layout2.html.php';