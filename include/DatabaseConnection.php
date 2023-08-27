<?php

$pdo = new PDO('mysql:host=localhost;dbname=Nombre de BD;charset=utf8', 'NOMBRE DE USUARIO DE BD', 'CLAVE DE ACCESO A BD');

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
