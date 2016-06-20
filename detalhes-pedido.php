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

$nPedido = mysql_query("select distinct(numero_pedido) from pedido_".$_SESSION['usuarioNome']);
?>

<script type="text/javascript">
	$(function(){
    $(".target-active").find("[href='pedido_new.php']").parent().addClass("active");
});
</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Detalhes do Pedido</h1>

        	<table>
        		<tr>
        			<td>
        				<b>Número do Pedido:</b> &nbsp;
        			</td>
        			<td>
        				<?php
        					echo "#".mysql_result($nPedido, 0);
        				?>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<b>Data do Pedido: </b>
        			</td>
        			<?php
        				date_default_timezone_set('America/Sao_Paulo');
        				echo "<td> ". date('d/m/y ');
						echo " </td>";
						?>
        		</tr>
        		<tr>
        			<td>
        				<b>Usuário: </b>
        			</td>
        			<td>
        				<?php
        					echo $_SESSION['usuarioNome'];
        				?>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<b>Valor do Pedido: </b>
        			</td>
        			<td>
        				<?php 
        					$tot = $_GET['total']; // Recebendo o valor enviado pelo link
        					echo "R$ ".number_format($tot, 2, ',', '.'); 
        				?>
        			</td>
        		</tr>
        	</table>
        	<br>
        	<h2 class="sub-header">Pedido <?php echo "#".mysql_result($nPedido, 0);?></h2>

		 <div class="table-responsive">
		 <table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
			        <th>R$ Caixa</th>
			        <th>R$ Venda</th>
					<th>Quantidade</th>
					<th>TOTAL</th>
					
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

			    echo "</tr>";
			    $subtotal = $subtotal + $ver['TOTAL'];
			}
			?>
		</table>
		<?php
			echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
		?>
		<div class="buttons">
			<a href="pedido_new.php" class="btn btn-primary">Alterar Pedido</a>
			<a href="enviar_pedido.php" class="btn btn-success">Confirmar</a>
		</div>

        	</div>

<?php
	require "footer.php";
?>