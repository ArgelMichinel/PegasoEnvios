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
	
    if (isset($_POST['list'])) {
        
        $list = $_POST['list'];
        delete($pdo, 'listasenvios', 'id_list', $list );
        delete($pdo, 'listas', 'id_list', $list );
    
        //////////////////////////////////////
        $title='Eliminar lista';
        
        ob_start();
        
        ?>

        <div class="presentacion">
          <div id="respuesta"><h2>Se eliminó la lista con éxito</h2></div>
        </div>
        
        <?php
            
        $output = ob_get_clean();
        ///////////////////////////////////////
        $inc_head = '<link rel="stylesheet" href="./Styles/delet_list.css">';
        $inc_script_end = '<!*********************************************************************>';
        //////////////////////////////////////
        
	} else {
        $title='Eliminar lista';
        
        $listas = findAll($pdo,'listas');
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" href="./Styles/delet_list.css">

        <?php

        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_delet_list.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////    
        $inc_script_end = '<!*********************************************************************>';
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';