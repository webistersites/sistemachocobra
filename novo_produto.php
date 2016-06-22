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

$produto = mysql_query("SELECT * FROM produtos");

?>
<script type="text/javascript">
	$(function(){
    $(".target-active").find("[href='novo_produto.php']").parent().addClass("active");
});
</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Novo Produto</h1>
        	<form class="form-horizontal" name="usuario" method="post" action="insere_produto.php">
	          <div class="form-group">
	              <label for="cDescricao" class="col-sm-2 control-label">Produto</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Nome" id="cDescricao" name="cDescricao">
	              </div>
	          </div>
	          <div class="form-group">
	              <label for="qtdCaixa" class="col-sm-2 control-label">Qtd Caixa</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Qtd Caixa" id="qtdCaixa" name="qtdCaixa">
	              </div>
	          </div>
	          <div class="form-group">
	              <label for="valorCaixa" class="col-sm-2 control-label">R$ Caixa</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Preço da caixa" id="valorCaixa" name="valorCaixa">
	              </div>
	          </div>
	          <div class="form-group">
	              <label for="valorVenda" class="col-sm-2 control-label">R$ Venda</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Preço de venda" id="valorVenda" name="valorVenda">
	              </div>
	          </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">Cadastrar</button>
				    </div>
				  </div>
	      </form>
	      <br>
        	<h3 class="sub-header">Gerenciar Produtos</h3>
        	<div class="table-responsive">
        		<br>
        		<table class="table">
        		<thead>
					<tr>
						<th>ID</th>
						<th>Produto</th>
				        <th>Qtd por Caixa</th>
				        <th>Valor da Caixa</th>
						<th>Valor de Venda</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<?php
					while ($ver=mysql_fetch_array($produto)) {
						echo "<tr>";
						echo "<td>".$ver['id_produto']."</td>";
						echo "<td>".$ver['descricao']."</td>";
						echo "<td>".$ver['qtd_caixa']."</td>";
						echo "<td>".$ver['valor_caixa']."</td>";
						echo "<td>".$ver['valor_venda']."</td>";
						echo "<td><a class='btn btn-danger btn-xs' href='del_produto.php?id=".$ver['id_produto']."'>X</a></td>";
					}
				?>
        		</table>
        	</div>
        </div>



<?php
	require "footer.php";
?>