<form action="" method="post" name="cad">
<div class="radio">
  <label><input type="radio" name="optradio" value="a vista">À vista - 5% de desconto</label>
</div>
<?php

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
    echo "<input type='submit' class='btn btn-default' value='Escolher' name='cad'>";
?>

</form>
