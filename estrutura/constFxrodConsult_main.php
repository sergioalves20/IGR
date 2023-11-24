<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Constituição da Faixa de Rodagem</title>              
    </head>
    <body>      
<?php
$op = "";
$pg = "constFxrodConsult";

if (filter_input(INPUT_GET, 'pg')) {
    $op = filter_input(INPUT_GET, 'op');
    $pg = filter_input(INPUT_GET, 'pg');
}

if ($pg == 'constFxrodConsult') {
    include_once 'constFxrodConsult.php';
}

if ($pg == 'voltar') {
    include_once 'registos.php';
}
 if ($pg == 'tabfxrodfund') {
            include_once '../tabelas/tabFxrodFund.php';
        }
 if ($pg == 'tabfxrodsubbase') {
            include_once '../tabelas/tabFxrodSubbase.php';
        }       
 if ($pg == 'tabfxrodbase') {
            include_once '../tabelas/tabFxrodBase.php';
        }       
if ($pg == 'tabfxrodbbl') {
            include_once '../tabelas/tabFxrodBblig.php';
}    
 if ($pg == 'tabfxrodbbd') {
            include_once '../tabelas/tabFxrodBbdsg.php';
}
    ?>
    </body>
    </html>  