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
	
    if (isset($_POST['new_admin'])) {
        
        $new_admin = $_POST['new_admin'];
        $num_errores = 0;
        
        if (empty($new_admin['email'])) {
            $num_errores += 1;
            $errores[] = 'El campo de email no puede quedar en blanco';
        }
        else {
            if (filter_var($new_admin['email'], FILTER_VALIDATE_EMAIL) == false) {
                $num_errores += 1;
                $errores[] = 'Dirección inválida de email';
            }
            // convert the email to lowercase
            $new_admin['email'] = strtolower($new_admin['email']);
            // Search for the lowercase version of $author['email']
            if (count(findSeveral($pdo,'administ','email',$new_admin['email'])) > 0) {
                $num_errores += 1;
                $errors[] = 'Este email ya ha sido registrado';
            }
        }
        
        if ($num_errores == 0) {
            $new_admin['password'] = password_hash($new_admin['password'], PASSWORD_DEFAULT);
            insert($pdo, 'administ', $new_admin);
            //////////////////////////////////////
            $title='Registro de administrador';

            ob_start();

            ?>

            <div class="formu">
              <div id="respuesta"><h2>Se agregó el administrador con éxito</h2></div>
            </div>

            <?php

            $output = ob_get_clean();
            ///////////////////////////////////////
            $inc_script_end = '<!****************>';
            $inc_head = '<link rel="stylesheet" href="./Styles/add_admin.css">';
            
        } else {
            $title='Registro de administrador';
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
            ///////////////////////////////////////////////////////////////////////////////////
        }
    
        
        //////////////////////////////////////
        
	} else {
        $num_errores = 0;
        $title='Resgitro de administrador';
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
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Cadete no resgistrado ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';