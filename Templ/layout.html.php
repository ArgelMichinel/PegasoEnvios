<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="pegaso envios seguridad logistica paquetes seguro envio">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="Pegaso inc.">
<meta property="og:image" content="https://www.pegasoenvios.com/img/logo4.png">
<meta property="og:title"content="Pegaso Envíos">
<meta property="og:image:type" content="image/jpg">
<meta property="og:image:width" content="250">
<meta property="og:image:height" content="250">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<title><?=$title?></title>
<link rel="stylesheet" href="Styles/H-styles.css">
<link rel="stylesheet" href="Styles/SN-styles.css">
<link rel="stylesheet" href="Styles/Footer-styles.css">
<!Estilo agregado para poder alinear div facilmente. Se usa con ul class="nav justify-content-end">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!Estilo agregado para el icono del menu">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!Estilos de letras>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
<?=$inc_head?>
</head>

<style>

    
</style>

<body>

<header>
	<div id="header" class="header">
		
        <div id="header" class="header1">
                <div class="hero-image">
                    <div class="logo-space">
                        <a class="brand" href="index.php" title="Pegaso home"
                            aria-label="Tracking Pegaso"><img src="images/logo-blanc.png" alt=""></a>
                    </div>
                </div>

                <div class="topnav" id="myTopnav">

                        <a class="underH" href="access.php"><i class="fa fa-user" aria-hidden="true"></i> Administrador</a>

                        <a href="javascript:void(0);" class="icon" onclick="FunctionTopnav()">
                        <i id="i-menu" class="fa fa-bars"></i>
                        </a>
                </div>
        </div>
		
	</div>
    <div id="expandible" class="topnav-responsive">
        <div id="under5"><a class="underH" href="access.php"><i class="fa fa-user" aria-hidden="true"></i> Administrador</a></div>
    </div>
</header> 
    
<main id="main">
<!*********************************************************************** Output>    
    
<?=$output?>
    
<!*********************************************************************** Footer>
<?php
    include __DIR__ . '/../Templ/footer.html.php';
?>
    
    
    
</main>

</body>
<script type="text/javascript" src="./js/H-Script.js"></script>
<?=$inc_script_end?>
<script>
    
    
</script>
</html>