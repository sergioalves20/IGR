<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Utilizador</title>          
    </head>
    <body>
<?php
        $op = "";
        $pg = "utilizador_nav";
        
        if (filter_input(INPUT_GET, 'pg')) {
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');            
        }
        if ($pg == 'utilizador_nav') {
            include_once 'utilizador_nav.php';            
        }        
        if ($pg == 'sair'){
           include_once 'index.php';      
        } 
       //Elementos da estrada
        //--SINGULARIDADE
        if ($pg == 'estradas_sing') {
            include_once '../tabelas/tabSingEstradas.php';       
        }
         if ($pg == 'consultas_sing') {
            include_once '../tabelas/tabSingConsultas.php';       
        }
        //-INTERSEÇÃO
         if ($pg == 'estradas_inters') {
            include_once '../tabelas/tabIntersEstrada.php';
        }
         if ($pg == 'consultas_inters') {
            include_once '../tabelas/tabIntersConsulta.php';
        }
        //--MUROS
         if ($pg == 'estradas_muros') {
            include_once '../tabelas/tabMurosEstradas.php';
        }
        if ($pg == 'consultas_muros') {
            include_once '../tabelas/tabMurosConsulta.php';
        }
        //--PASSAGENS HIDRÁULICAS
        if ($pg == 'estradas_ph') {
            include_once '../tabelas/tabPhEstradas.php';
        }
          if ($pg == 'consultas_ph') {
            include_once '../tabelas/tabPhConsultas.php';
        }
        //--TALUDES
        if ($pg == 'tabtaludeconsulta') {
            include_once '../tabelas/tabTaludeConsulta.php';
        }
        if ($pg == 'estradas_talude') {
            include_once '../tabelas/tabTaludeEstradas.php';
        }
        if ($pg == 'consultas_talude') {
            include_once '../tabelas/tabTaludeConsulta.php';
        }
        //--BANQUETAS
         if ($pg == 'consultas_banq') {
            include_once '../tabelas/tabBanquetaConsulta.php';
        }
        //--CURVAS EM PLANTA
         if ($pg == 'consultas_curvap') {
            include_once '../tabelas/tabCurvasPlantaConsultas.php';
        }
        //CURVAS VERTICAIS
         if ($pg == 'consultas_curvav') {
            include_once '../tabelas/tabCurvasVerticaisConsultas.php';
        }
        //---------------- PERFIS TRANSVERSAIS -------------
        //FAIXA DE RODAGEM
         if ($pg == 'estradas_fxrod') {
            include_once '../tabelas/tabFxrodListEstradas.php';
        }
         if ($pg == 'consultas_fxrod') {
            include_once '../tabelas/tabFxrodConsulta.php';
        }
        //BERMAS
        if ($pg == 'estradas_bermas') {
            include_once '../tabelas/tabBermasEstradas.php';
        }
        if ($pg == 'consultas_bermas') {
            include_once '../tabelas/tabBermasConsulta.php';
        }
        //DRENAGEM SUPERFICIAL
         if ($pg == 'estradas_drensupf') {
            include_once '../tabelas/tabDrensupfListEstradas.php';
        }
        if ($pg == 'consultas_drensupf') {
            include_once '../tabelas/tabDrensupfConsulta.php';
        }
        //-------------- EQUIPAMENTOS DE SEGURANÇA ----------------- 
         //SEPARADOR CENTRAL
        if ($pg == 'estradas_sepcentral') {
            include_once '../tabelas/tabSepCentralEstradas.php';
        }
         if ($pg == 'consultas_sepcentral') {
            include_once '../tabelas/tabSepCentralConsulta.php';
        }
        //GUARDAS DE SEGURANÇA
         if ($pg == 'estradas_guardseg') {
            include_once '../tabelas/tabGuardSegEstradas.php';
        }
         if ($pg == 'consultas_guardseg') {
            include_once '../tabelas/tabGuardSegConsulta.php';
        }
        //SINALIZAÇÃO HORIZONTAL
        if ($pg == 'estradas_sinalhz') {
            include_once '../tabelas/tabSinalhzEstradas.php';
        }
        if ($pg == 'consultas_sinalhz') {
            include_once '../tabelas/tabSinalhzConsulta.php';
        }
        //MARCADORES
         if ($pg == 'estradas_marc') {
            include_once '../tabelas/tabMarcEstradas.php';
        }
        if ($pg == 'consultas_marc') {
            include_once '../tabelas/tabMarcConsulta.php';
        }
        //SINALIZAÇÃO VERTICAL
        if ($pg == 'estradas_sinalvt') {
            include_once '../tabelas/tabSinalvtEstradas.php';
        }
         if ($pg == 'consultas_sinalvt') {
            include_once '../tabelas/tabSinalvtConsulta.php';
        }
        //DELINEADORES
        if ($pg == 'estradas_delin') {
            include_once '../tabelas/tabDelinEstradas.php';
        }
         if ($pg == 'consultas_delin') {
            include_once '../tabelas/tabDelinConsulta.php';
        }
        // ------------ TIPO DE PAVIMENTO ------------------
        //FAIXA DE RODAGEM
         if ($pg == 'estradas_fxrodtipo') {
            include_once '../tabelas/tabFxrodTipoListEstradas.php';
        }
        if ($pg == 'consultas_fxrodtipo') {
            include_once '../tabelas/tabFxrodTipoConsulta.php';
        }
        //BERMAS
        if ($pg == 'estradas_bermatipo') {
            include_once '../tabelas/tabBermaTipoEstradas.php';
        }
        if ($pg == 'consultas_bermatipo') {
            include_once '../tabelas/tabBermaTipoConsulta.php';
        }

       //----------- CONSTITUIÇÃO DA FAIXA DE RODAGEM ---------

        if ($pg == 'constfxrodconsult') {
            include_once 'constFxrodConsult.php';
        }
        //..............................
        //FUNDAÇÃO
        if ($pg == 'consultas_fxrodfund') {
            include_once '../tabelas/tabFxrodFundConsulta.php';
        }
       //BASE
         if ($pg == 'consultas_fxrodbase') {
            include_once '../tabelas/tabFxrodBaseConsulta.php';
        }
       //SUB BASE
        if ($pg == 'consultas_Fxrodsubbase') {
            include_once '../tabelas/tabFxrodSubbaseConsulta.php';
        }
        //BB DE LIGAÇÃO
         if ($pg == 'consultas_fxrodbblig') {
            include_once '../tabelas/tabFxrodBbligConsulta.php';
        }
        //BB DE DESGASTE
         if ($pg == 'consultas_fxrodbbdsg') {
            include_once '../tabelas/tabFxrodBbdsgConsulta.php';
        }
        //--------------------------------------------------
       // Constituição das Bermas 

        if ($pg == 'constbermaconsult') {
            include_once 'constBermaConsult.php';
        }
        //------------FUNDAÇÃO BERMA------------------------------------
        if ($pg == 'consults_bermasfund') {
            include_once '../tabelas/tabBermasFundConsulta.php';
        }
        //-------------SUB BASE BERMA----------------------------------------
        if ($pg == 'consultas_bermasubbase') {
            include_once '../tabelas/tabBermaSubBaseConsulta.php';
        }
        //------------BASE BERMA-----------------------------------------
        if ($pg == 'consultas_bermasbase') {
            include_once '../tabelas/tabBermasBaseConsulta.php';
        }
        //------------BBLigação BERMA-----------------------------------------
        if ($pg == 'consultas_bermasbbl') {
            include_once '../tabelas/tabBermasBbligConsulta.php';
        }
        //-----------BBDesgaste BERMA----------------------------------------
         if ($pg == 'consultas_bermasbbd') {
            include_once '../tabelas/tabBermasBbdsgConsulta.php';
        }
        
 ?>
    </body>
</html>    
