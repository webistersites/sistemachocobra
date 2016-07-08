<?php
include "conectar_banco.php";
include "seguranca.php";

$produto = $_POST['cDescricao'];
$valor_caixa = $_POST['valorCaixa'];
$valor_unitario = $_POST['valorUnitario'];

$sql = mysql_query("insert into produtos values('','$produto',$valor_unitario,$valor_caixa,0)");

echo "Cadastrando Produto";

mysql_close($conexao);

?>

<meta http-equiv="refresh" content="0.2;url=novo_produto.php">