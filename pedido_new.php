<?php
include "conectar_banco.php";
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina();

$cabecalho = "header.html";
$sql = mysql_query("SELECT permissao FROM usuarios where id = " . $_SESSION['usuarioID']);
$resultado = mysql_fetch_assoc($sql);

if ($resultado['permissao'] == 0) {
$cabecalho = "header-noPermission.php";
}

require $cabecalho;


	protegePagina(); 
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
b.valor_caixa*a.quantidade as TOTAL
FROM pedido_".$_SESSION['usuarioNome']." a
INNER JOIN
	produtos b
ON
	a.produtos_id_produto = b.id_produto");
?>
<script type="text/javascript">
	$(function(){
    $(".target-active").find("[href='pedido_new.php']").parent().addClass("active");
});
</script>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Novo Pedido</h1>

        	<form class="form-vertical" name="produto" method="post" action="insere_pedido.php">
                <div class="form-group">
                    <label for="descricao" class="control-label col-sm-1">Produto</label>
                    <div class="col-sm-4">
                        <select name="produto" class="form-control">
                            <option class="dropdown">Selecione...</option>
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
		 		    <label for="" class="control-label col-sm-1">Quantidade</label>
                    <div class="col-sm-1">
                        <input class="form-control" type="text" placeholder="" id="qtd_input" name="qtd">
                    </div>
                </div>
                <div class="form-group col-md-offset-8">
                    <button type="submit" name="submit" class="btn btn-default">Selecionar</button>
                </div>
            <!-- <div class="form-group">
                <a href="enviar_pedido.php" class="btn btn-success">Finalizar Pedido</a>
            </div> -->
		 </form>
		 <br>

		 <h2 class="sub-header">Visualização do pedido</h2>

		 <div class="table-responsive">

		 	<br>
		 <table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
			        <th>R$ Caixa</th>
			        <th>R$ Venda</th>
					<th>Quantidade</th>
					<th>TOTAL</th>
					<th>#</th>
				</tr>
			</thead>
			<?php
			$subtotal = 0;
			while($ver=mysql_fetch_array($query)){

				echo "<tr>";
			    echo "<td>".$ver['id_pedido']."</td>";
			    echo "<td>".$ver['descricao']."</td>";
			    echo "<td>R$ ".number_format($ver['valor_caixa'], 2, ',', '.')."</td>";
			    echo "<td>R$ ".number_format($ver['valor_venda'], 2, ',', '.')."</td>";
			    echo "<td>".$ver['quantidade']."</td>";
			    echo "<td><b>R$ ".number_format($ver['TOTAL'], 2, ',', '.')."</b></td>";
			    echo "<td><a class='btn btn-danger btn-xs' href='deletar.php?id=".$ver['id_pedido']."'>X</a></td>";
			    echo "</tr>";
			    $subtotal = $subtotal + $ver['TOTAL'];
			}
			?>
		</table>
		<?php
			echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
		?>
				<div class="buttons">
		 		<a href="deletar_pedido.php" class="btn btn-warning">Limpar Lista</a>
		 		<?php
		 		if ($subtotal <= 1999) {
		 			echo "<a href='enviar_pedido.php' class='btn btn-success disabled'>Finalizar Pedido</a>";
		 		} elseif ($subtotal >= 2000) {
		 			echo "<a href='detalhes-pedido.php?total=".$subtotal."' class='btn btn-success'>Finalizar Pedido</a>";
		 		}
		 		
		 		?>
		 	</div>

	</div>
       </div>

<?php
	require "footer.php";
?>