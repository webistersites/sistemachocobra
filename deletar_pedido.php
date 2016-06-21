<?php
include "conectar_banco.php";
include "seguranca.php";

$sql = "truncate table pedido_" . $_SESSION['usuarioLogin'];

$sql2 = mysql_query("UPDATE produtos_".$_SESSION['usuarioLogin']." SET foi_pedido = 0");

$resultado = mysql_query($sql);
echo "Deletando pedido";

mysql_close($conexao);

?>

<meta http-equiv="refresh" content="0.5;url=pedido_new.php">
