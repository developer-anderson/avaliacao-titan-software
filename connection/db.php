<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB', 'titan');

    $db = new mysqli(HOST, USER, PASSWORD, DB) or die ('Erro ao conectar');
    $db->set_charset("utf8");
?>