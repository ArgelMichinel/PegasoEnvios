<?php
session_start();
//echo($_SESSION['user'] . ' ' . $_SESSION['password']);

try {
    include __DIR__ . '/../include/DatabaseConnection.php';
    include __DIR__ . '/../include/Access_functions.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        IsLogged($pdo);
        header('Location: desk_admin.php');
        die();
        
	} elseif (isset($_POST['login'])) {
        
        
        $user = $_POST['login']['user'];
        $contra = $_POST['login']['password'];
        $tipo = 'administ';
        
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
                $administra = findByID($pdo,'administ','email',$user);

                if (empty($administra)) {
                    $errores[] = 'Credenciales inválidas';
                } else {
                    if (!empty($contra)) {
                        if (!password_verify($contra,$administra['password'])) {
                            $errores[] = 'Credenciales inválidas';
                        } elseif (password_verify($contra,$administra['password'])) {
                            $_SESSION['user'] = $user;
                            $_SESSION['password'] = $administra['password'];
                            header('location: desk_admin.php');
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

        include __DIR__ . '/../Templ/out_access.html.php';

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

        include __DIR__ . '/../Templ/out_access.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout1.html.php';