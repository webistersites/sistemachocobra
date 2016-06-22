<?
$html = <<<HTML
<html>
    <head>
        <title>%s</title>
        <script type="text/javascript">
            alert( '%s' );
        </script>
    </head>
    <body>
        <div><span class='titulo'>%s</span><span class='conteudo'>%s</span></div>
    </body>
</html>
HTML;

printf( $html , "Título da página" , "Alerta do javascript" , "Título da div" , "O conteúdo da sua DIV" );