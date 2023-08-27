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
	
    if (isset($_POST['new_cadete'])) {
        
        $new_cadete = $_POST['new_cadete'];
        
        $bande = 1; // indica que el cadete existe
        
        if ($new_cadete['num_cadete'] == "" ) {
            $bande = 0;
            $today = new DateTime();
            $today->modify('-3 hours');
            $today_text = $today->format('Y-m-d h:i:s');
            $new_cadete['created_at'] = $today_text;
            $new_cadete['updated_at'] = $today_text;
        }
            
        while ($bande == 0 ) {
            $num_cadete= rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
            $new_cadete ['num_cadete']= $num_cadete;
            $today = new DateTime();
            $today->modify('-3 hours');
            $today_text = $today->format('Y-m-d h:i:s');
            $new_cadete['updated_at'] = $today_text;
            
            $cadete = findById($pdo, 'cadetes', 'num_cadete', $num_cadete);
            if ( !isset($cadete['dni']) ) {
                $bande = 1;
            }
        }
        
        save($pdo, 'cadetes', 'num_cadete', $new_cadete);
    
        //////////////////////////////////////
        $title='Registro de Cadete';
        
        ob_start();
        
        ?>

        <div class="formu">
          <div id="respuesta"><h2>Se agregó/actualizó el cadete numero <?=$new_cadete ['num_cadete']?> con éxito</h2></div>
        </div>
        
        <?php
            
        $output = ob_get_clean();
        ///////////////////////////////////////
        $inc_script_end = '<!****************>';
        $inc_head = '<link rel="stylesheet" href="./Styles/regis_cadete.css">';
        //////////////////////////////////////
        
	} else {
        if (isset($_GET['num_cadete'])) {
            $cadete = findById($pdo, 'cadetes', 'num_cadete', $_GET['num_cadete']);
            $title='Actualizar Cadete';
        } else {
            $title='Registrar Cadete';
        }
        
        ///////////////////////////////////////////////////////////////////////////////////
        
        $inc_head = '<link rel="stylesheet" href="./Styles/regis_cadete.css">';
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_regis_cadete.html.php';

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