<?php
include "conectar_banco.php";
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
$criarTabela = "CREATE TABLE IF NOT exists `pedido_".$_SESSION['usuarioNome']."` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(12) unsigned NOT NULL,
  `produtos_id_produto` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedido_FKIndex1` (`produtos_id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$criarTabela2 = mysql_query("CREATE TABLE produtos_".$_SESSION['usuarioNome']." AS SELECT * FROM produtos;");

$result = mysql_query($criarTabela);

$query = mysql_query("select a.id_pedido,
a.descricao,
b.valor_caixa,
b.valor_unit,
b.valor_venda,
a.quantidade,
b.valor_venda*a.quantidade as TOTAL
FROM pedido_".$_SESSION['usuarioNome']." a
INNER JOIN
	produtos b
ON
	a.produtos_id_produto = b.id_produto");

?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo-menu.css">
	<title>Pedido | ChocolateriaBrasileira</title>
</head>
<body id="body">
<div class="interface">
	<?php
        //require "menu.php";

    ?>
    <div id="greetings">
        <?php
        echo "Olá " . $_SESSION['usuarioNome'] . ", &nbsp;&nbsp;<a href='logout.php'>sair</a><br>";
        ?>
    </div>
    <br>

    <a href="ult_ped.php" class="btn btn-default">Último pedido</a>
    <br>

<h1>Selecione o Produto</h1>
    <br>
		<form class="form-inline" name="produto" method="post" action="insere_pedido.php">
                <div class="form-group">
                    <label for="descricao" class="control-label col-sm-2">Produto</label>
                    <div class="col-sm-1">
                        <select name="produto" class="form-control dropdown">
                            <option>Selecione...</option>
                                <?php
                                $produtos = mysql_query("SELECT * FROM produtos_".$_SESSION['usuarioNome']." WHERE foi_pedido = 0");
                                while ($lista=mysql_fetch_array($produtos)) {

                                echo "<option value='".$lista['descricao']."'>" . $lista['descricao'] . "</option>";
                                }

                                ?>

                            <!-- <option value="Barra ao leite 100 gr">Barra ao leite 100 gr</option>
                            <option value="Barra meio amargo 100 gr">Barra meio amargo 100 gr</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
		 		    <label for="" class="control-label col-sm-6">Quantidade</label>
                    <div class="col-sm-1">
                        <input class="form-control" type="text" placeholder="" id="qtd_input" name="qtd" size="1">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info">Selecionar</button>
                </div>
            <div class="form-group">
                <a href="enviar_pedido.php" class="btn btn-success">Finalizar Pedido</a>
            </div>
		 </form>

    <div id="divisor">

    </div>

<!-- *******************************
**~ ÁREA DE EXIBIÇÃO DOS PEDIDOS ~**
************************************ -->

    <br><br>
<h1>Pedido</h1>
<br>
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>ID</th>
		<th>Nome</th>
        <th>R$ Caixa</th>
        <th>R$ Unidade</th>
        <th>R$ Venda</th>
		<th>Quantidade</th>
		<th>TOTAL</th>
		<th>Ação</th>
	</tr>

<?php
while($ver=mysql_fetch_array($query)){

	echo "<tr>";
    echo "<td>".$ver['id_pedido']."</td>";
    echo "<td>".$ver['descricao']."</td>";
    echo "<td>".$ver['valor_caixa']."</td>";
    echo "<td>".$ver['valor_unit']."</td>";
    echo "<td>".$ver['valor_venda']."</td>";
    echo "<td>".$ver['quantidade']."</td>";
    echo "<td>".$ver['TOTAL']."</td>";
    echo "<td><a class='btn btn-danger btn-xs' href='deletar.php?id=".$ver['id_pedido']."'>Excluir</a></td>";
    echo "</tr>";
}
?>
</table>
<br>
    <a href="deletar_pedido.php" class="btn btn-default">Limpar Lista</a>
    <br>
    <br>
    <br>

</div>
</body>
</html>