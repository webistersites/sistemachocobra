<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); //Remover erro de código depreciado
    $conexao = mysql_connect("localhost", "root", "");
    mysql_select_db("chocolateria");
    mysql_set_charset('UTF8', $conexao);
?>