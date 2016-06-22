<?php

include "conectar_banco.php";
include "seguranca.php";

$id = $_GET['id']; // Recebendo o valor enviado pelo link

$sql = "DELETE FROM produtos WHERE id_produto=".$id;

$resultado = mysql_query($sql);

mysql_close($conexao); // Fechando a conexão com o banco de dados

echo "Excluindo...";

?>

<meta http-equiv="refresh" content="0.2;url=novo_produto.php">