<?php
include "conectar_banco.php";
include "seguranca.php";

$produto = $_POST['cDescricao'];
$qtd_caixa = $_POST['qtdCaixa'];
$valor_caixa = $_POST['valorCaixa'];
$valor_venda = $_POST['valorVenda'];

$sql = mysql_query("insert into produtos values('','$produto',$qtd_caixa,$valor_caixa,0,$valor_venda,'Barras',0)");

echo "Cadastrando Produto";

mysql_close($conexao);

?>

<meta http-equiv="refresh" content="0.2;url=novo_produto.php">