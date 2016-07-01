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
	$criarTabela = "CREATE TABLE IF NOT exists `pedido_".$_SESSION['usuarioLogin']."` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(12) unsigned NOT NULL,
  `produtos_id_produto` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedido_FKIndex1` (`produtos_id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$criarTabela2 = mysql_query("CREATE TABLE produtos_".$_SESSION['usuarioLogin']." AS SELECT * FROM produtos;");

$result = mysql_query($criarTabela);

$query = mysql_query("select 
    a.descricao,
    b.valor_caixa,
    b.valor_venda,
    a.quantidade,
    a.quantidade*b.valor_caixa as TOTAL,
    a.prazo
FROM 
	pedido a
INNER JOIN
	produtos b
ON 
	a.descricao = b.descricao
WHERE
	a.usuario = '".$_SESSION['usuarioNome']."'
AND
	numero_pedido = (select max(numero_pedido) from pedido where usuario='".$_SESSION['usuarioNome']."')");

$query2 = mysql_query("select 
    a.descricao,
    b.valor_caixa,
    b.valor_venda,
    a.quantidade,
    a.quantidade*b.valor_caixa as TOTAL,
    a.prazo
FROM 
	pedido a
INNER JOIN
	produtos b
ON 
	a.descricao = b.descricao
WHERE
	a.usuario = '".$_SESSION['usuarioNome']."'
AND
	numero_pedido = (select max(numero_pedido)-1 from pedido where usuario='".$_SESSION['usuarioNome']."')");

$query3 = mysql_query("select 
    a.descricao,
    b.valor_caixa,
    b.valor_venda,
    a.quantidade,
    a.quantidade*b.valor_caixa as TOTAL,
    a.prazo
FROM 
	pedido a
INNER JOIN
	produtos b
ON 
	a.descricao = b.descricao
WHERE
	a.usuario = '".$_SESSION['usuarioNome']."'
AND
	numero_pedido = (select max(numero_pedido)-2 from pedido where usuario='".$_SESSION['usuarioNome']."')");

$ult_pedido = mysql_query("select max(numero_pedido) as NPedido,`data` from pedido where usuario='".$_SESSION['usuarioNome']."' and numero_pedido = (select max(numero_pedido) from pedido where usuario = '".$_SESSION['usuarioNome']."')");
$ult_pedido2 = mysql_query("select max(numero_pedido) as NPedido,`data` from pedido where usuario='".$_SESSION['usuarioNome']."' and numero_pedido = (select max(numero_pedido)-1 from pedido where usuario = '".$_SESSION['usuarioNome']."')");
$ult_pedido3 = mysql_query("select max(numero_pedido) as NPedido,`data` from pedido where usuario='".$_SESSION['usuarioNome']."' and numero_pedido = (select max(numero_pedido)-2 from pedido where usuario = '".$_SESSION['usuarioNome']."')");
?>
<script type="text/javascript">
	$(function(){
    $(".target-active").find("[href='pedido_new.php']").parent().addClass("active");
});
</script>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Pedidos Anteriores</h1>
		 <br>
		 
		 <div class="table-responsive">
			<div class="buttons"><a href="pedido_new.php" class="btn btn-primary">NOVO PEDIDO</a></div>
		 <br>
		 <h3>Pedido #<?php
		 				$ver2 = mysql_fetch_array($ult_pedido);
						echo $ver2['NPedido']; ?></h3>
		 <table>
        		<tr>
        			<td>
        				<b>Data do Pedido: ..... </b>&nbsp;
        			</td>
        			<td>
        			<?php
						//$ver2 = mysql_fetch_array($ult_pedido);
						echo $ver2['data'];
						?>
					</td>
        		</tr>
        		<tr>
        			<td>
        				<b>Usuário: ..................</b>
        			</td>
        			<td>
        				<?php
        					echo $_SESSION['usuarioNome'];
        				?>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<b>Prazo: ......................</b>
        			</td>
        			<td>
        				<?php 
        					$buscaprazo = mysql_query("
        						select 
									prazo 
								from 
									pedido 
								WHERE
									usuario = '".$_SESSION['usuarioNome']."'
								AND
									numero_pedido = (select max(numero_pedido) from pedido where usuario='".$_SESSION['usuarioNome']."');
									");
        					$prz = mysql_result($buscaprazo, 0);
        					echo "$prz";
        				?>
        			</td>
        		</tr>
        	</table>
        	<br>
		 <table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Produto</th>
			        <th>R$ Caixa</th>
			        <th>R$ Venda</th>
					<th>Quantidade</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<?php
			while($ver=mysql_fetch_array($query)){

				echo "<tr>";
			    echo "<td>".$ver['descricao']."</td>";
			    echo "<td>R$ ".number_format($ver['valor_caixa'], 2, ',', '.')."</td>";
			    echo "<td>R$ ".number_format($ver['valor_venda'], 2, ',', '.')."</td>";
			    echo "<td>".$ver['quantidade']."</td>";
			    echo "<td><b>R$ ".number_format($ver['TOTAL'], 2, ',', '.')."</b></td>";
			    echo "</tr>";
			    $subtotal = $subtotal + $ver['TOTAL'];
			    if ($ver['prazo'] == "a vista") {
			    	$subtotal = $subtotal*0.95;
			    }
			}

			?>
		</table>
		<?php
			echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
		?>
		<br>
		<h3>Pedido #<?php $ver3 = mysql_fetch_array($ult_pedido2); echo $ver3['NPedido']; ?></h3>
		<table>
        		<tr>
        			<td>
        				<b>Data do Pedido: ..... </b>&nbsp;
        			</td>
        			<td>
        			<?php
						//$ver3 = mysql_fetch_array($ult_pedido2);
						echo $ver3['data'];
						?>
					</td>
        		</tr>
        		<tr>
        			<td>
        				<b>Usuário: ..................</b>
        			</td>
        			<td>
        				<?php
        					echo $_SESSION['usuarioNome'];
        				?>
        			</td>
        		</tr>
        		        		<tr>
        			<td>
        				<b>Prazo: ......................</b>
        			</td>
        			<td>
        				<?php 
        					$buscaprazo = mysql_query("
        						select 
									prazo 
								from 
									pedido 
								WHERE
									usuario = '".$_SESSION['usuarioNome']."'
								AND
									numero_pedido = (select max(numero_pedido)-1 from pedido where usuario='".$_SESSION['usuarioNome']."');
									");
								if (!mysql_num_rows($buscaprazo) || mysql_result($buscaprazo, 0) == "") {
								    echo ('NoData');
								} else {
        					$prz = mysql_result($buscaprazo, 0);
        					echo "$prz";
        					}
        				?>
        			</td>
        		</tr>
        	</table>
        	<br>
		 <table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Produto</th>
			        <th>R$ Caixa</th>
			        <th>R$ Venda</th>
					<th>Quantidade</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<?php
			$subtotal = 0;
			while($ver=mysql_fetch_array($query2)){

				echo "<tr>";
			    echo "<td>".$ver['descricao']."</td>";
			    echo "<td>R$ ".number_format($ver['valor_caixa'], 2, ',', '.')."</td>";
			    echo "<td>R$ ".number_format($ver['valor_venda'], 2, ',', '.')."</td>";
			    echo "<td>".$ver['quantidade']."</td>";
			    echo "<td><b>R$ ".number_format($ver['TOTAL'], 2, ',', '.')."</b></td>";
			    echo "</tr>";
			    $subtotal = $subtotal + $ver['TOTAL'];
    			    if ($ver['prazo'] == "a vista") {
			    	$subtotal = $subtotal*0.95;
			    }
			}
			?>
		</table>
		<?php
			echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
		?>
		<br>
		<h3>Pedido #<?php $ver3 = mysql_fetch_array($ult_pedido3); echo $ver3['NPedido']; ?></h3>
		<table>
        		<tr>
        			<td>
        				<b>Data do Pedido: ..... </b>&nbsp;
        			</td>
        			<td>
        			<?php
						//$ver3 = mysql_fetch_array($ult_pedido3);
						echo $ver3['data'];
						?>
					</td>
        		</tr>
        		<tr>
        			<td>
        				<b>Usuário: ..................</b>
        			</td>
        			<td>
        				<?php
        					echo $_SESSION['usuarioNome'];
        				?>
        			</td>
        		</tr>
        		        		<tr>
        			<td>
        				<b>Prazo: ......................</b>
        			</td>
        			<td>
        				<?php 
        					$buscaprazo = mysql_query("
        						select 
									prazo 
								from 
									pedido 
								WHERE
									usuario = '".$_SESSION['usuarioNome']."'
								AND
									numero_pedido = (select max(numero_pedido)-2 from pedido where usuario='".$_SESSION['usuarioNome']."');
									");
								if (!mysql_num_rows($buscaprazo)) {
								    echo ('NoData');
								} else {
        					$prz = mysql_result($buscaprazo, 0);
        					echo "$prz";
        					}
        				?>
        			</td>
        		</tr>
        	</table>
        	<br>
		 <table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Produto</th>
			        <th>R$ Caixa</th>
			        <th>R$ Venda</th>
					<th>Quantidade</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<?php
			$subtotal = 0;
			while($ver=mysql_fetch_array($query3)){

				echo "<tr>";
			    echo "<td>".$ver['descricao']."</td>";
			    echo "<td>R$ ".number_format($ver['valor_caixa'], 2, ',', '.')."</td>";
			    echo "<td>R$ ".number_format($ver['valor_venda'], 2, ',', '.')."</td>";
			    echo "<td>".$ver['quantidade']."</td>";
			    echo "<td><b>R$ ".number_format($ver['TOTAL'], 2, ',', '.')."</b></td>";
			    echo "</tr>";
			    $subtotal = $subtotal + $ver['TOTAL'];
    			    if ($ver['prazo'] == "a vista") {
			    	$subtotal = $subtotal*0.95;
			    }
			}
			?>
		</table>
		<?php
			echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
		?>

		</div>
       </div>

<?php
	require "footer.php";
?>