<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Constituição da Berma</title>               
    </head>
    <body>       
<?php
$op = "";
$pg = "constBerma";

if (filter_input(INPUT_GET, 'pg')) {
    $op = filter_input(INPUT_GET, 'op');
    $pg = filter_input(INPUT_GET, 'pg');
}

if ($pg == 'constBerma') {
    include_once 'constBerma.php';
}

if ($pg == 'voltar') {
    include_once 'levantamento.php';
}
 if ($pg == 'bermafund') {
            include_once '../frms/frmBermasFund.php';
        }
//---------------------------------------------------------------------
 if ($pg == 'bermasubbase') {
            include_once '../frms/frmBermasSubbase.php';
        }
        
//------------------------------------------------------------------        
 if ($pg == 'bermabase') {
            include_once '../frms/frmBermasBase.php';
        }       
if ($pg == 'bermabbl') {
            include_once '../frms/frmBermasBblig.php';
}    
 if ($pg == 'bermabbd') {
            include_once '../frms/frmBermasBbdsg.php';
}               
?>
    </body>
</html>  