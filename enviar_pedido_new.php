<?php
 include "conectar_banco.php";
include "seguranca.php";

$buscando = mysql_query("SELECT id_pedido,descricao,quantidade FROM pedido_".$_SESSION['usuarioLogin'])
or die(mysql_error());

date_default_timezone_set('America/Sao_Paulo');
$horario = date('d/m/y');

/* Medida preventiva para evitar que outros dom�nios sejam remetente da sua mensagem. */
/*if (eregi('tempsite.ws$|chocolateriabrasileira.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender='contato@chocolateriabrasileira.com.br'; // Substitua essa linha pelo seu e-mail@seudominio
} else {
        $emailsender = "contato@" . $_SERVER[HTTP_HOST];
        //    Na linha acima estamos for�ando que o remetente seja 'webmaster@seudominio',
        // Voc� pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}*/

$nPedido = mysql_query("select distinct(numero_pedido) from pedido_".$_SESSION['usuarioLogin']);
$ped = mysql_result($nPedido, 0);

$emailsender = 'junior@webister.com.br';
$emailremetente = 'junior@webister.com.br';
$assunto = 'Novo pedido efetuado - Pedido #'.$ped.' ('.$_SESSION['usuarioNome'].') ';
 
/* Verifica qual �o sistema operacional do servidor para ajustar o cabe�alho de forma correta.  */
if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
else $quebra_linha = "\n"; //Se "não for Windows"
 

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>Contato realizado atraves do Site.</P>
<P><b>Cliente: </b>'.$texto.'</P>
<p><b>Email: </b>'.$emailremetente.'</p>
<p><b>Mensagem: </b></p>
<hr>';

$subtotal = $_GET['sub'];
$prazoPag = $_GET['prazo'];

$mensagemHTML2 =   
        '<p>
            Pedido: ..........#'.$ped.'
            <br>
            Usuario: ..........'.$_SESSION['usuarioNome'].'
            <br>
            Prazo Pagamento: ...'.$prazoPag.'
            <br>
            Subtotal: ..........'.number_format($subtotal,2,',','.').'
        </p>
        <table border="1">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
            </thead>';

while ($linha = mysql_fetch_array( $buscando )) {

  $nomeProdutoG = $linha['descricao'];
  $quantidadeG = $linha['quantidade'];

  // concatena a cada iteração
  $mensagemHTML2 .= '
            <tr>
                <td>'.$nomeProdutoG.'</td>
                <td align="center">'.$quantidadeG.'</td>
            </tr>'
  ;

}

$mensagemHTML2 .= '</table>
<br>--<br>
Este e-mail foi enviado atraves do sistema de pedidos em Chocolateria Brasileira (<a href="http://chocolateriabrasileira.com.br">http://chocolateriabrasileira.com.br</a>)';
 
 
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
// Perceba que a linha acima cont�m "text/html", sem essa linha, a mensagem n�o chegar� formatada.
$headers .= "From: " . $emailsender.$quebra_linha;
//$headers .= "Cc: " . $comcopia . $quebra_linha;
//$headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
$headers .= "Reply-To: " . $emailremetente . $quebra_linha;
// Note que o e-mail do remetente ser� usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */

 //mail($emailsender, $assunto, $mensagemHTML2, $headers );

$passarDados = mysql_query("INSERT INTO pedido (numero_pedido,descricao,quantidade,usuario,data,prazo) SELECT numero_pedido,descricao, quantidade, usuario,'".$horario."','".$prazoPag."' FROM pedido_" . $_SESSION['usuarioLogin']);

$droparTabela = mysql_query("drop table pedido_" . $_SESSION['usuarioLogin']);
$droparTabela2 = mysql_query("drop table produtos_".$_SESSION['usuarioLogin']);

    $msg = "Lista Enviada com Sucesso!";
    echo "<script>location.href='ultimos_pedidos.php'; alert('$msg');</script>";

?>