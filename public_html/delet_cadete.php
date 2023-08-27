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
	
    if (isset($_POST['cadete'])) {
        
        $id_cade = $_POST['cadete'];
        delete($pdo, 'cadetes', 'num_cadete', $id_cade );
    
        //////////////////////////////////////
        $title='Eliminar Cadete';
        
        ob_start();
        
        ?>

        <div class="presentacion">
          <div id="respuesta"><h2>Se eliminó el cadete con éxito</h2></div>
        </div>
        
        <?php
            
        $output = ob_get_clean();
        ///////////////////////////////////////
        $inc_head = '<link rel="stylesheet" href="./Styles/delet_list.css">';
        $inc_script_end = '<!*********************************************************************>';
        //////////////////////////////////////
        
	} else {
        
        $title='Eliminar Cadete';

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
    }
        
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';