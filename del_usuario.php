<?php

include "conectar_banco.php";
include "seguranca.php";

$id = $_GET['id']; // Recebendo o valor enviado pelo link

$buscaNome = mysql_query("select usuario from usuarios where id = ".$id);
$buscado = mysql_result($buscaNome, 0);

$del_tabela = mysql_query("drop table pedido_".$buscado);
$del_produtos = mysql_query("drop table produtos_".$buscado);

$sql = "DELETE FROM usuarios WHERE id=".$id;

$resultado = mysql_query($sql);

mysql_close($conexao); // Fechando a conexão com o banco de dados

echo "Excluindo...";

?>

<meta http-equiv="refresh" content="0.3;url=novo_usuario.php">