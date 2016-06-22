<?php

include "conectar_banco.php";
include "seguranca.php";

$buscando = mysql_query("SELECT id_pedido,descricao,quantidade FROM pedido_".$_SESSION['usuarioLogin'])
or die(mysql_error());
$destino = 'junior@webister.com.br';
$assunto = 'Pedido de cliente - Teste';


$html = ''; // cria variável $html fora do loop
while ($linha = mysql_fetch_array( $buscando )) {


  $nomeProdutoG = $linha['descricao'];
  $quantidadeG = $linha['quantidade'];

  // concatena a cada iteração
  $html .= echo "<b>Nome: </b>".$nomeProdutoG;

}

$header = "From: Franqueado\r\n";
$header .= "MIME-Version: 1.1\r\n";
$header .= "Content-Type: text/html; charset=iso-8859-1\r\n";

$envio = mail($destino, $assunto, $html, $headers);

$passarDados = mysql_query("INSERT INTO pedido (numero_pedido,descricao,quantidade,usuario) SELECT numero_pedido,descricao, quantidade, usuario FROM pedido_" . $_SESSION['usuarioLogin']);

$droparTabela = mysql_query("drop table pedido_" . $_SESSION['usuarioLogin']);
$droparTabela2 = mysql_query("drop table produtos_".$_SESSION['usuarioLogin']);

?>

<meta http-equiv="refresh" content="0.5;url=index.php">