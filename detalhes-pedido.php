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
b.valor_unitario,
a.quantidade,
b.valor_caixa*a.quantidade as TOTAL
FROM pedido_".$_SESSION['usuarioLogin']." a
INNER JOIN
    produtos b
ON
    a.produtos_id_produto = b.id_produto");

$nPedido = mysql_query("select distinct(numero_pedido) from pedido_".$_SESSION['usuarioLogin']);
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
                    <td colspan="2">
                        <b>Prazo de Pagamento:</b> 
                        <?php 
                            $prazo = $_POST['optradio']; 
                            if ($prazo == '') {
                                echo "<small><i> --</i></small>";
                            }
                            echo "$prazo"; 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <?php
                            if ($prazo == '') {
                                 echo '<a href="#popup1" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"> </span> Selecionar Condições</a>';
                             }
                             elseif ($prazo <> '') {
                                 echo '<a href="#popup1" class="btn btn-info btn-xs disabled"><span class="glyphicon glyphicon-pencil"> </span> Selecionar Condições</a>';
                             }
                              
                        ?>
                    </td>
                    <td>
                        <?php include "prazo.php"; ?>
                    </td>
                </tr>
        	</table>
            <?php $msg = $_POST['msg'];?>
        	<br>
        	<h2 class="sub-header">Pedido <?php echo "#".mysql_result($nPedido, 0);?></h2>

		 <div class="table-responsive">
		 <table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
			        <th>R$ Caixa</th>
			        <th>R$ Unitário</th>
					<th>Quantidade</th>
					<th>TOTAL</th>					
				</tr>
			</thead>
			<?php
			$subtotal = 0;
            $ped = mysql_result($nPedido, 0);
			while($ver=mysql_fetch_array($query)){

				echo "<tr>";
			    echo "<td>".$ver['id_pedido']."</td>";
			    echo "<td>".$ver['descricao']."</td>";
			    echo "<td>R$ ".number_format($ver['valor_caixa'], 2, ',', '.')."</td>";
			    echo "<td>R$ ".number_format($ver['valor_unitario'], 2, ',', '.')."</td>";
			    echo "<td>".$ver['quantidade']."</td>";
			    echo "<td><b>R$ ".number_format($ver['TOTAL'], 2, ',', '.')."</b></td>";

			    echo "</tr>";
			    $subtotal = $subtotal + $ver['TOTAL'];
			}
			?>
		</table>
		<?php
            if ($prazo <> "a vista") {
                echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
            }
            elseif ($prazo == "a vista") {
                $subtotal = $subtotal*0.95;
                echo "<h4 id='direita'>SUBTOTAL: &nbsp;&nbsp;<b>R$ ".number_format($subtotal, 2, ',', '.')."</b></h4>";
            }
			
		?>
		<div class="buttons">
			<a href="pedido_new.php" class="btn btn-primary">Alterar Pedido</a>
			<?php
                $prazo = $_POST['optradio']; 
                if ($prazo == "") {
                    echo "<a href='enviar_pedido_new.php?sub=".$subtotal."&prazo=".$prazo."' class='btn btn-success disabled'>Confirmar</a>";
                }
                elseif ($prazo <> "") {
                    echo "<a href='enviar_pedido_new.php?sub=".$subtotal."&prazo=".$prazo."&msg=".$msg."' class='btn btn-success'>Confirmar</a>";
                }

                 ?>
		</div>

        	</div>

<?php
	require "footer.php";
?>