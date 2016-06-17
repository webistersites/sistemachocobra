<?php
include "conectar_banco.php";
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina();
include "header.html";

$sql = mysql_query("SELECT permissao FROM usuarios where id = " . $_SESSION['usuarioID']);
$resultado = mysql_fetch_assoc($sql);

if ($resultado['permissao'] == 0) {
header("Location: pedido_new.php");
}

?>
<script type="text/javascript">
$(function(){
    $(".target-active").find("[href='produto.php']").parent().addClass("active");
});
</script>

        <form class="form-horizontal" name="usuario" method="post" action="insere_produto.php">
          <div class="form-group">
              <label for="cDesc" class="col-sm-2 control-label">Descrição</label>
              <div class="col-sm-5">
                <input class="form-control" type="text" placeholder="nome do produto..." id="descInput" name="descInput">
              </div>
          </div>
            <div class="form-group">
                <label for="cCat" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" placeholder="" id="catInput" name="catInput">
                </div>
            </div>
            <div class="form-group">
                <label for="cQtd" class="col-sm-2 control-label">Qtd por Caixa</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" placeholder="" id="qtdInput" name="qtdInput">
                </div>
            </div>
              <div class="form-group">
                  <label for="cCaixa" class="col-sm-2 control-label">R$ Caixa</label>
                  <div class=" input-group col-sm-2">
                      <div class="input-group-addon">$</div>
                      <input class="form-control" type="text" placeholder="" id="caixaInput" name="caixaInput">
                  </div>
              </div>
              <div class="form-group">
                  <label for="cUnit" class="col-sm-2 control-label">R$ Unit</label>
                  <div class="input-group col-sm-2">
                      <div class="input-group-addon">$</div>
                      <input class="form-control" type="text" placeholder="" id="unitInput" name="unitInput">
                  </div>
              </div>
              <div class="form-group">
                  <label for="cVenda" class="col-sm-2 control-label">R$ Venda</label>
                  <div class="input-group col-sm-2">
                      <div class="input-group-addon">$</div>
                      <input class="form-control" type="text" placeholder="" id="vendaInput" name="vendaInput">
                  </div>
              </div>
            <br>
          <div class="form-group">
              <div class="col-sm-offset-1">
                  <input class="btn btn-primary" type="submit" value="Cadastrar">
              </div>
          </div>
        </form>

<?php
  require "footer.php";
?>