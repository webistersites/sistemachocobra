<?php
include "conectar_banco.php";
include "seguranca.php";

$nome = $_POST['cNome'];
$login = $_POST['cLogin'];
$senha = $_POST['cSenha'];
if ($_POST['cAdmin'] == "on") {
	$permissao = 1;
} elseif ($_POST['cAdmin'] != "on") {
	$permissao = 0;
}

$sql = mysql_query("insert into usuarios values('','$nome','$login','$senha','$permissao')");

echo "Cadastrando Usuario";

mysql_close($conexao);

?>

<meta http-equiv="refresh" content="0.2;url=novo_usuario.php">