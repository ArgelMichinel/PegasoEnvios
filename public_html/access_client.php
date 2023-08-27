<?php
session_start();
try {
    include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
                
        header('Location: desk_client.php');
        die();
        
	} elseif (isset($_POST['login'])) {
        
        include __DIR__ . '/../include/Access_functions.php';
        
        $user = $_POST['login']['user'];
        $contra = $_POST['login']['password'];
        
        //$errores = Authentification($pdo, $user, $contra);
        if (empty($user)) {
            $errores[] = 'El campo de email no puede quedar en blanco';
        } else {
            if (filter_var($user, FILTER_VALIDATE_EMAIL) == false) {
                $errores[] = 'Dirección inválida de email';
            } else {
                // convert the email to lowercase
                $user = strtolower($user);
                // Search for the lowercase version of $author['email']
                $administra = findByID($pdo,'access','email',$user);

                if (empty($administra)) {
                    $errores[] = 'Credenciales inválidas';
                } else {
                    if (!empty($contra)) {
                        if (!password_verify($contra,$administra['password'])) {
                            $errores[] = 'Credenciales inválidas';
                        } elseif (password_verify($contra,$administra['password'])) {
                            require_once __DIR__ . '/../include/Meli_functions.php';
                            $dat_user = checkValdTok($pdo,$administra['user_id']);
                            $_SESSION['user'] = $user;
                            $_SESSION['password'] = $dat_user['password'];
                            $_SESSION['user_id'] = $dat_user['user_id'];
                            $_SESSION['access_tok'] = $dat_user['access_tok'];
                            header('location: desk_client.php');
                            die();
                        }
                    } else {
                        $errores[] = 'Credenciales inválidas';
                    }
                }

            }
        }
        
        $num_errores = count($errores);
    
        $title='Ingreso usuario';
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" href="./Styles/access.css">
        <script type="text/javascript" language="javascript" src="./js/access.js"></script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_access_client.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////    
        $inc_script_end = '<!****************>';
        ///////////////////////////////////////////////////////////////////////////////////
        
	} else {
        $title='Ingreso usuario';
        $errores = [];
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>
        
        <link rel="stylesheet" href="./Styles/access.css">
        <script type="text/javascript" language="javascript" src="./js/access.js"></script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_access_client.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout.html.php';