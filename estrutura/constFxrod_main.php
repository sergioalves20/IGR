<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contituição da Faixa de rodagem</title>          
    </head>
    <body>
<?php
$op = "";
$pg = "constFxrod";

if (filter_input(INPUT_GET, 'pg')) {
    $op = filter_input(INPUT_GET, 'op');
    $pg = filter_input(INPUT_GET, 'pg');
}

if ($pg == 'constFxrod') {
    include_once 'constFxrod.php';
}

if ($pg == 'voltar') {
    include_once 'levantamento.php';
}
 if ($pg == 'fxrodfund') {
            include_once '../frms/frmFxrodFund.php';
        }
 if ($pg == 'fxrodsubbase') {
            include_once '../frms/frmFxrodSubbase.php';
        }       
 if ($pg == 'fxrodbase') {
            include_once '../frms/frmFxrodBase.php';
        }       
if ($pg == 'fxrodbbl') {
            include_once '../frms/frmFxrodBblig.php';
}    
 if ($pg == 'fxrodbbd') {
            include_once '../frms/frmFxrodBbdsg.php';
}
?>
    </body>
</html>  