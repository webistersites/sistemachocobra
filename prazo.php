<div id="popup1" class="overlay">
<div class="popup">
    <h2>Condições:</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">
        <form action="detalhes-pedido.php" method="post">
            <div class="radio">
              <label><input type="radio" name="optradio" value="a vista">À vista - 5% de desconto</label>
            </div>
            <?php
                $tot = $_GET['total'];

                if ($tot <= 3999) {
                    include("forma1.php");
                }
                elseif ($tot >= 4000 and $tot <= 5999) {
                    include("forma2.php");
                }
                elseif ($tot >= 6000 and $tot <= 7999) {
                    include("forma3.php");
                }
                elseif ($tot >= 8000) {
                    include("forma4.php");
                }

            ?>
            <br>
            <b>Mensagem: </b> <small><i>(Opcional)</i></small>
        <textarea class="form-control" name="msg" id="msg" rows="5"></textarea>
        <br>
        <input type="submit" class="btn btn-default" value="Concluir">
        </form>
    </div>
    <br>
</div>
</div>

