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

    if (isset($_POST['del_client'])) {
    
        $del_client = $_POST['del_client'];
        
        delete($pdo, 'access', 'user_id', $del_client );
        
        $clients = findAll($pdo,"access");

        $name = [];
        for ($i =0; $i<count($clients); $i++ ) {
            $dummy = info_user($pdo,$clients[$i]['user_id']);
            $name[$i] = $dummy['nickname'];
        }

        $title='Consultar información de clientes';

        ob_start();
        ?>

        <link rel="stylesheet" type="text/css" href="./Styles/info_client.css">
        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copy', 'csv', 'excel',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 5,
                    "scrollX": true
                } );
            } );
        </script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_info_client.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<script type="text/javascript" language="javascript" src="./js/info_client.js"></script>';
        ///////////////////////////////////////////////////////////////////////////////////

    } else {

        $clients = findAll($pdo,"access");

        $name = [];
        for ($i =0; $i<count($clients); $i++ ) {
            $dummy = info_user($pdo,$clients[$i]['user_id']);
            $name[$i] = $dummy['nickname'];
        }

        $title='Consultar información de clientes';

        ob_start();
        ?>

        <link rel="stylesheet" type="text/css" href="./Styles/info_client.css">
        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copy', 'csv', 'excel',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 5,
                    "scrollX": true
                } );
            } );
        </script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_info_client.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<script type="text/javascript" language="javascript" src="./js/info_client.js"></script>';
        ///////////////////////////////////////////////////////////////////////////////////

    }

} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';