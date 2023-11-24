<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador</title>        
    </head>
    <body>
      
<?php
        $op = "";
        $pg = "admin_main";
        if (filter_input(INPUT_GET, 'pg')) {
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');            
        }    
        if ($pg == 'admin_nav') {
            include_once 'admin_nav.php';            
        }
        if($pg == 'registos'){
            include_once 'registos.php';    
        }
        if($pg == 'levantamento'){
            include_once 'levantamento.php';    
        }        
        if ($pg == 'sair'){
           include_once 'index.php';           
        }
        if($pg == 'iniciar'){
            include_once 'admin_nav.php';
        }
        if($pg == 'gestor'){
            include_once 'gestor_nav.php';
        }
        if($pg == 'regisgestor'){
            include_once '../frms/frmGestor.php';
        }
        if($pg == 'utilizador'){
            include_once 'utilizador_nav.php';
        } 
         if($pg == 'estrada_registo'){
            include_once '../frms/frmEstradas.php';
        }
        if($pg == 'estradas'){
            include_once '../tabelas/tabEstradas.php';  
        } 
         if($pg == 'usuario'){
            include_once '../frms/frmUsuario.php';
        }
         if($pg == 'alterar'){
            include_once 'alterar.php';
        }
         if($pg == 'estradas_ocorr'){
            include_once '../tabelas/tabOcorrEstradas.php';  
        }
         if($pg == 'consultas'){
            include_once 'registos.php';  
        }
        if ($pg == 'constfxrodconsult') {
            include_once 'constFxrodConsult.php';
        }
        if ($pg == 'constbermaconsult') {
            include_once 'constBermaConsult.php';
        }
        if ($pg == 'itenspatolog') {
            include_once '../frms/frmItensPatologias.php';
        }
        if ($pg == 'itensorcamento') {
            include_once '../frms/frmItensOrcamento.php';
        }
         ?>
            </form>
    </body>
</html> 
    