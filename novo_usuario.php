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

$user = mysql_query("SELECT * FROM usuarios");

?>
<script type="text/javascript">
	$(function(){
    $(".target-active").find("[href='novo_usuario.php']").parent().addClass("active");
});
</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Novo Usuário</h1>
        	<form class="form-horizontal" name="usuario" method="post" action="insere_usuario.php">
	          <div class="form-group">
	              <label for="cNome" class="col-sm-2 control-label">Nome</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Nome" id="cNome" name="cNome">
	              </div>
	          </div>
	          <div class="form-group">
	              <label for="cLogin" class="col-sm-2 control-label">Login</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Login" id="cLogin" name="cLogin">
	              </div>
	          </div>
	          <div class="form-group">
	              <label for="cSenha" class="col-sm-2 control-label">Senha</label>
	              <div class="col-sm-3">
	                <input class="form-control" type="text" placeholder="Senha" id="cSenha" name="cSenha">
	              </div>
	          </div>
				 <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox" id="cAdmin" name="cAdmin"> Permissão de Admin
				        </label>
				      </div>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">Cadastrar</button>
				    </div>
				  </div>
	      </form>
	      <br>
        	<h3 class="sub-header">Gerenciar Usuários</h3>
        	<div class="table-responsive">
        		<br>
        		<table class="table">
        		<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
				        <th>Login</th>
				        <th>Senha</th>
						<th>Permissão</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<?php
					while ($ver=mysql_fetch_array($user)) {
						echo "<tr>";
						echo "<td>".$ver['id']."</td>";
						echo "<td>".$ver['nome']."</td>";
						echo "<td>".$ver['usuario']."</td>";
						echo "<td>*****</td>";
						if ($ver['permissao'] == 1) {
							echo "<td>Administrador</td>";
						} elseif ($ver['permissao'] == 0) {
							echo "<td>Usuário</td>";
						}
						echo "<td><a class='btn btn-danger btn-xs' href='del_usuario.php?id=".$ver['id']."'>X</a></td>";
					}
				?>
        		</table>
        	</div>
        </div>



<?php
	require "footer.php";
?>