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
	
    if (isset($_POST['new_query'])) {
        
        $title='Encomiendas Pegaso';
        $pegaso_entrust = query_customized($pdo,$_POST['new_query'],'Pegaso_envios');
        //print_r($pegaso_entrust);
        $clients = findAll($pdo,"access");
        $cadetes = findAll($pdo,"cadetes");
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/query_packets.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/pegaso_orders.js"></script>
        <script src="./js/leaflet.js"></script>
        <link rel="stylesheet" href="./Styles/leaflet.css" />
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copyHtml5', 'csvHtml5', 'excelHtml5',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 10,
                    "scrollX": true
                } );

                $('.switch-1').on( 'click', function (e) {
                    e.preventDefault();
            
                    // Get the column API object
                    var column = table.column( $(this).attr('data-column') );
                    //$(this).prop("checked", ! $(this).prop("checked"));
            
                    // Toggle the visibility
                    column.visible( ! column.visible() );
                } );

            } );
        </script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_pegaso_orders.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////
        
	} else {
        $title='Encomiendas Pegaso';
        $pegaso_entrust = find300($pdo,'Pegaso_envios','date_in');
        $clients = findAll($pdo,"access");
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>
        
        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/query_packets.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/pegaso_orders.js"></script>
        <script src="./js/leaflet.js"></script>
        <link rel="stylesheet" href="./Styles/leaflet.css" />
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copy', 'csv', 'excel',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 10,
                    "scrollX": true
                } );

                $('.switch-1').on( 'click', function (e) {
                    e.preventDefault();

                    // Get the column API object
                    var column = table.column( $(this).attr('data-column') );
                    // Toggle the visibility
                    column.visible( ! column.visible() );
                } );

            } );
        </script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_pegaso_orders.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout2.html.php';