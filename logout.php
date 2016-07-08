<?php
include "conectar_banco.php";
  $usuario = $_GET['user'];
  $limpa = mysql_query("DROP TABLE produtos_".$usuario);

  session_start(); // Inicia a sessão
  session_destroy(); // Destrói a sessão limpando todos os valores salvos
  header("Location: login.php"); exit; // Redireciona o visitante