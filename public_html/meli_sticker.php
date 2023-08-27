<?php
session_start();
include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        include __DIR__ . '/../include/Access_functions.php';
        
        IsLogged($pdo);
        
	} else {
        header('location: index.php');
    }
    
    include __DIR__ . '/../include/Meli_functions.php';

if (isset($_GET['id_client']) && isset($_GET['shipnum'])) {
        
    $client = $_GET['id_client'];
    $shipnum = $_GET['shipnum'];

    echo(meli_sticker($pdo,$shipnum,$client));
    echo('paso por aca'. $shipnum);
    $title='Etiqueta';
    
       /* $title='Registro de administrador';
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>
        <link rel="stylesheet" href="./Styles/add_admin.css">
        <script type="text/javascript" language="javascript" src="./js/add_admin.js"></script>
        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_add_admin.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////    
        $inc_script_end = '<!****************>';
        ///////////////////////////////////////////////////////////////////////////////////*/
    

    
    
}