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

?>
<script type="text/javascript">
	$(function(){
    $(".target-active").find("[href='novo_usuario.php']").parent().addClass("active");
});
</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Novo Usuário</h1>
        </div>



<?php
	require "footer.php";
?>