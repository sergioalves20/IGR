<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestor</title>        
    </head>
    <body>
<?php
        $op = "";
        $pg = "gestor_nav";
        
        if (filter_input(INPUT_GET, 'pg')) {
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');            
        }
      
        if ($pg == 'gestor_nav') {
            include_once 'gestor_nav.php';            
        } 
        if ($pg == 'infor') {
            include_once 'informacao.php';            
        } 
        if ($pg == 'sair'){
           include_once 'login_admin.php';      
        }
        if($pg == 'voltargest'){
            include_once 'gestor.php';    
        }
        
         if($pg == 'listanac'){
            include_once '../tabelas/tabEstradas.php';    
        }
         if($pg == 'levantamento'){
            include_once 'levantamento.php';    
        }
        if($pg == 'registos'){
            include_once 'registos.php';    
        }
         if($pg == 'estradas_ocorr'){
            include_once '../tabelas/tabOcorrEstradas.php';  
        }
         
        if ($pg == 'constfxrodconsult') {
            include_once 'constFxrodConsult.php';
        }
         if ($pg == 'constbermaconsult') {
            include_once 'constBermaConsult.php';
        }
        if ($pg == 'empreitadas') {
            include_once 'empreitadas.php';
        }
        
         if ($pg == 'gestorobra') {
            include_once '../empreitadas/frmGestorObra.php';       
        }
        if ($pg == 'tabgobra') {
            include_once '../tabelas/tabGestorObra.php';       
        }
        if ($pg == 'gestrada') {
            include_once '../frms/frmGestorEstrada.php';       
        }
        if ($pg == 'tabgestrada') {
            include_once '../tabelas/tabGestorEstrada.php';       
        }
        if ($pg == 'itensorcamento') {
            include_once '../empreitadas/itensOrcamento.php';       
        }
         if ($pg == 'itenspatologia') {
            include_once '../tabelas/tabPatologiaItens_1.php';       
        }
     ?>
    </body>
</html>    