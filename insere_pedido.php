<?php
include "conectar_banco.php";
include "seguranca.php";

$prod = $_POST['produto'];
$quantidade = $_POST['qtd'];

$buscaID = mysql_query("SELECT max(numero_pedido) FROM pedido WHERE usuario = '" . $_SESSION['usuarioNome'] . "'");
$somaId = mysql_result($buscaID,0) + 1;

$idProduto = mysql_query("SELECT id_produto FROM produtos WHERE descricao = '".$prod."'");
$idProd = mysql_result($idProduto, 0);

$sql = "insert into pedido_" . $_SESSION['usuarioNome'] . " values('',".$somaId.",$idProd,'$prod','$quantidade','" . $_SESSION['usuarioNome'] . "')";

$resultado = mysql_query($sql);

$foiPedido = mysql_query("UPDATE produtos_".$_SESSION['usuarioNome']." SET foi_pedido = 1 WHERE id_produto = ".$idProd);

echo "Adicionado ao pedido";

mysql_close($conexao);

?>

<meta http-equiv="refresh" content="0.2;url=pedido_new.php">

