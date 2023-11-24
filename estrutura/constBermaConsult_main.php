<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Constituição da Berma</title>               
    </head>
    <body>       
<?php
$op = "";
$pg = "constBermaConsult";

if (filter_input(INPUT_GET, 'pg')) {
    $op = filter_input(INPUT_GET, 'op');
    $pg = filter_input(INPUT_GET, 'pg');
}

if ($pg == 'constBermaConsult') {
    include_once 'constBermaConsult.php';
}

if ($pg == 'voltar') {
    include_once 'registos.php';
}
 if ($pg == 'tabbermafund') {
            include_once '../tabelas/tabBermasFund.php';
        }
//---------------------------------------------------------------------
 if ($pg == 'tabbermasubbase') {
            include_once '../tabelas/tabBermaSubbase.php';
        }
        
//------------------------------------------------------------------        
 if ($pg == 'tabbermabase') {
            include_once '../tabelas/tabBermasBase.php';
        }       
if ($pg == 'tabbermabbl') {
            include_once '../tabelas/tabBermasBblig.php';
}    
 if ($pg == 'tabbermabbd') {
            include_once '../tabelas/tabBermasBbdsg.php';
}               
?>
    </body>
</html>  