<?php

include "conectar_banco.php";
include "seguranca.php";

$id = $_GET['id']; // Recebendo o valor enviado pelo link

$buscaNaoPedido = mysql_query("SELECT produtos_id_produto FROM pedido_".$_SESSION['usuarioNome']." WHERE id_pedido=".$id);
$idNaoPedido = mysql_result($buscaNaoPedido, 0);

$naoPedido = mysql_query("UPDATE produtos_".$_SESSION['usuarioNome']." SET foi_pedido = 0 WHERE id_produto = ".$idNaoPedido);

$sql = "DELETE FROM pedido_" . $_SESSION['usuarioNome'] . " WHERE id_pedido=".$id;

$resultado = mysql_query($sql);

mysql_close($conexao); // Fechando a conexão com o banco de dados

echo "Excluindo...";

?>

<meta http-equiv="refresh" content="0.3;url=pedido_new.php">