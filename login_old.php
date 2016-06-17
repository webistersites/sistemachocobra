<?php
include "conectar_banco.php";
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<link rel="stylesheet" href="css/skeleton.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Inicio | ChocolateriaBrasileira</title>
</head>
<body>

<div class="layout">
    <div id="login">
        <table border="0" align="center" cellspacing="15px">
            <tr>
                <td>
                    <form method="post" action="valida.php">
                        <label>Usuário</label>
                        <input type="text" name="usuario" maxlength="50" />

                        <label>Senha</label>
                        <input type="password" name="senha" maxlength="50" />
                        <br>
                        <input type="submit" value="Entrar" class="button-primary"/>
                    </form>
                </td>
                <td valign="top">
                    <img src="_img/logo_final_2016_peq.png">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="copyr">
                    <h3>Powered by Webister© | 2016</h3>
                </td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>