<?php
include "conectar_banco.php";
include("seguranca.php");
protegePagina();

  $sql = "SELECT permissao FROM usuarios where id = " . $_SESSION['usuarioID'];
  $query = mysql_query($sql);
  $resultado = mysql_fetch_assoc($query);

  if ($resultado['permissao'] == 0) {
  	echo "voce nao tem permissao!<br>";
  	echo "<meta http-equiv='refresh' content='2;url=index.php'>";
  	
  } elseif ($resultado['permissao'] == 1) {
  	echo "<meta http-equiv='refresh' content='0.5;url=cadastro_franq.php'>";
  }

  	

?>