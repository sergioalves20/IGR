<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultas</title>              
    </head>
    <body>      
        <?php
        $op="";
        $pg="consultas";
            
        if (filter_input(INPUT_GET,'pg')){
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');
        }
       //CONSULTAS     
         if ($pg == 'registos') {
            include_once 'registos.php';       
        }
         if($pg == 'sair'){
             include_once 'login_admin.php'; 
         } 
         if($pg == 'estradas'){
             include_once '../tabelas/tabEstradas.php'; 
         }       
         //Elementos da estrada
        //--SINGULARIDADE
        if ($pg == 'tabsingularidade') {
            include_once '../tabelas/tabSingularidade.php';       
        }
        if ($pg == 'estradas_sing') {
            include_once '../tabelas/tabSingEstradas.php';       
        }
         if ($pg == 'consultas_sing') {
            include_once '../tabelas/tabSingConsultas.php';       
        }
        //-INTERSEÇÃO
       
         if ($pg == 'tabintersecao') {
            include_once '../tabelas/tabIntersecao.php';
        }
         if ($pg == 'estradas_inters') {
            include_once '../tabelas/tabIntersEstrada.php';
        }
         if ($pg == 'consultas_inters') {
            include_once '../tabelas/tabIntersConsulta.php';
        }
        //--MUROS
        if ($pg == 'tabmuros') {
            include_once '../tabelas/tabMuros.php';
        }
         if ($pg == 'estradas_muros') {
            include_once '../tabelas/tabMurosEstradas.php';
        }
        if ($pg == 'consultas_muros') {
            include_once '../tabelas/tabMurosConsulta.php';
        }
        //--PASSAGENS HIDRÁULICAS
        if ($pg == 'tabphidraulica') {
            include_once '../tabelas/tabPhidraulica.php';
        }
        if ($pg == 'estradas_ph') {
            include_once '../tabelas/tabPhEstradas.php';
        }
          if ($pg == 'consultas_ph') {
            include_once '../tabelas/tabPhConsultas.php';
        }
        //--TALUDES
         if ($pg == 'tabtalude') {
            include_once '../tabelas/tabTalude.php';
        }
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
        if ($pg == 'tabbanqueta') {
            include_once '../tabelas/tabBanqueta.php';
        }
         if ($pg == 'consultas_banq') {
            include_once '../tabelas/tabBanquetaConsulta.php';
        }
        //--CURVAS EM PLANTA
         if ($pg == 'tabcurvap') {
            include_once '../tabelas/tabCurvasPlanta.php';
        }
         if ($pg == 'consultas_curvap') {
            include_once '../tabelas/tabCurvasPlantaConsultas.php';
        }
        //CURVAS VERTICAIS
        if ($pg == 'tabcurvav') {
            include_once '../tabelas/tabCurvasVerticais.php';
        }
         if ($pg == 'consultas_curvav') {
            include_once '../tabelas/tabCurvasVerticaisConsultas.php';
        }
        //---------------- PERFIS TRANSVERSAIS -------------
        //FAIXA DE RODAGEM
         if ($pg == 'tabfxrod') {
            include_once '../tabelas/tabFxrod.php';
        }
         if ($pg == 'estradas_fxrod') {
            include_once '../tabelas/tabFxrodListEstradas.php';
        }
         if ($pg == 'consultas_fxrod') {
            include_once '../tabelas/tabFxrodConsulta.php';
        }
        //BERMAS
        if ($pg == 'tabbermas') {
            include_once '../tabelas/tabBermas.php';
        }
        if ($pg == 'estradas_bermas') {
            include_once '../tabelas/tabBermasEstradas.php';
        }
        if ($pg == 'consultas_bermas') {
            include_once '../tabelas/tabBermasConsulta.php';
        }
        //SOBRA DE ESTRADA
        if ($pg == 'consultas_sobra') {
            include_once '../tabelas/tabSobraEstradaConsulta.php';
        }
        //DRENAGEM SUPERFICIAL
        if ($pg == 'tabdrensupf') {
            include_once '../tabelas/tabDrensupf.php';
        }
         if ($pg == 'estradas_drensupf') {
            include_once '../tabelas/tabDrensupfListEstradas.php';
        }
        if ($pg == 'consultas_drensupf') {
            include_once '../tabelas/tabDrensupfConsulta.php';
        }
        //-------------- EQUIPAMENTOS DE SEGURANÇA ----------------- 
         //SEPARADOR CENTRAL
        if ($pg == 'tabsepcentral') {
            include_once '../tabelas/tabSepCentral.php';
        }
        if ($pg == 'estradas_sepcentral') {
            include_once '../tabelas/tabSepCentralEstradas.php';
        }
         if ($pg == 'consultas_sepcentral') {
            include_once '../tabelas/tabSepCentralConsulta.php';
        }
        //GUARDAS DE SEGURANÇA
        if ($pg == 'tabguardseg') {
            include_once '../tabelas/tabGuardSeg.php';
        }
         if ($pg == 'estradas_guardseg') {
            include_once '../tabelas/tabGuardSegEstradas.php';
        }
         if ($pg == 'consultas_guardseg') {
            include_once '../tabelas/tabGuardSegConsulta.php';
        }
        //SINALIZAÇÃO HORIZONTAL
        if ($pg == 'tabsinalhz') {
            include_once '../tabelas/tabSinalHorizontal.php';
        }
        if ($pg == 'estradas_sinalhz') {
            include_once '../tabelas/tabSinalhzEstradas.php';
        }
        if ($pg == 'consultas_sinalhz') {
            include_once '../tabelas/tabSinalhzConsulta.php';
        }
        //MARCADORES
         if ($pg == 'tabmarcadores') {
            include_once '../tabelas/tabMarcadores.php';
        }
         if ($pg == 'estradas_marc') {
            include_once '../tabelas/tabMarcEstradas.php';
        }
        if ($pg == 'consultas_marc') {
            include_once '../tabelas/tabMarcConsulta.php';
        }
        //SINALIZAÇÃO VERTICAL
         if ($pg == 'tabsinalvt') {
            include_once '../tabelas/tabSinalVertical.php';
        }
        if ($pg == 'estradas_sinalvt') {
            include_once '../tabelas/tabSinalvtEstradas.php';
        }
         if ($pg == 'consultas_sinalvt') {
            include_once '../tabelas/tabSinalvtConsulta.php';
        }
        //DELINEADORES
        if ($pg == 'tabdelineadores') {
            include_once '../tabelas/tabDelineadores.php';
        }
        if ($pg == 'estradas_delin') {
            include_once '../tabelas/tabDelinEstradas.php';
        }
         if ($pg == 'consultas_delin') {
            include_once '../tabelas/tabDelinConsulta.php';
        }
        // ------------ TIPO DE PAVIMENTO ------------------
        //FAIXA DE RODAGEM
         if ($pg == 'tabfxrodtipo') {
            include_once '../tabelas/tabFxrodTipo.php';
        }
         if ($pg == 'estradas_fxrodtipo') {
            include_once '../tabelas/tabFxrodTipoListEstradas.php';
        }
        if ($pg == 'consultas_fxrodtipo') {
            include_once '../tabelas/tabFxrodTipoConsulta.php';
        }
        //BERMAS
        if ($pg == 'tabbermatipo') {
            include_once '../tabelas/tabBermaTipo.php';
        }
        if ($pg == 'estradas_bermatipo') {
            include_once '../tabelas/tabBermaTipoEstradas.php';
        }
        if ($pg == 'consultas_bermatipo') {
            include_once '../tabelas/tabBermaTipoConsulta.php';
        }
        //SOBRAS
        
        if ($pg == 'consultas_sobratipo') {
            include_once '../tabelas/tabSobraEstradaTipoConsulta.php';
        }
          if ($pg == 'estradas_sobratipo') {
            include_once '../tabelas/tabSobraEstradaEstradas.php';
        }
       //----------- CONSTITUIÇÃO DA FAIXA DE RODAGEM ---------

        if ($pg == 'constfxrodconsult') {
            include_once 'constFxrodConsult.php';
        }
        //..............................
        //FUNDAÇÃO
        if ($pg == 'tabFxrodfund') {
            include_once '../tabelas/tabFxrodFund.php';
        }
        if ($pg == 'consultas_fxrodfund') {
            include_once '../tabelas/tabFxrodFundConsulta.php';
        }
       //BASE
         if ($pg == 'tabFxrodbase') {
            include_once '../tabelas/tabFxrodBase.php';
        }
         if ($pg == 'consultas_fxrodbase') {
            include_once '../tabelas/tabFxrodBaseConsulta.php';
        }
       //SUB BASE
         if ($pg == 'tabFxrodsubbase') {
            include_once '../tabelas/tabFxrodSubbase.php';
        }
        if ($pg == 'consultas_Fxrodsubbase') {
            include_once '../tabelas/tabFxrodSubbaseConsulta.php';
        }
        //BB DE LIGAÇÃO
        if ($pg == 'tabfxrodbblig') {
            include_once '../tabelas/tabFxrodBblig.php';
        }
         if ($pg == 'consultas_fxrodbblig') {
            include_once '../tabelas/tabFxrodBbligConsulta.php';
        }
        //BB DE DESGASTE
         if ($pg == 'tabfxrodbbdsg') {
            include_once '../tabelas/tabFxrodBbdsg.php';
        }
         if ($pg == 'consultas_fxrodbbdsg') {
            include_once '../tabelas/tabFxrodBbdsgConsulta.php';
        }
        //--------------------------------------------------
       // Constituição das Bermas 

        if ($pg == 'constbermasconsult') {
            include_once 'constBermaConsult.php';
        }
        //------------FUNDAÇÃO BERMA------------------------------------
        
        if ($pg == 'tabbermasfund') {
            include_once '../tabelas/tabBermasFund.php';
        }
        if ($pg == 'consults_bermasfund') {
            include_once '../tabelas/tabBermasFundConsulta.php';
        }
        //-------------SUB BASE BERMA----------------------------------------
       
        if ($pg == 'tabbermasubbase') {
            include_once '../tabelas/tabBermaSubBase.php';
        }
        if ($pg == 'consultas_bermasubbase') {
            include_once '../tabelas/tabBermaSubBaseConsulta.php';
        }
        //------------BASE BERMA-----------------------------------------
        
        if ($pg == 'tabbermasbase') {
            include_once '../tabelas/tabBermasBase.php';
        }
        if ($pg == 'consultas_bermasbase') {
            include_once '../tabelas/tabBermasBaseConsulta.php';
        }
        //------------BBLigação BERMA-----------------------------------------
       
        if ($pg == 'tabbermasbbl') {
            include_once '../tabelas/tabBermasBblig.php';
        }
        if ($pg == 'consultas_bermasbbl') {
            include_once '../tabelas/tabBermasBbligConsulta.php';
        }
        //-----------BBDesgaste BERMA----------------------------------------
       
         if ($pg == 'tabbermasbbd') {
            include_once '../tabelas/tabBermasBbdsg.php';
        }
         if ($pg == 'consultas_bermasbbd') {
            include_once '../tabelas/tabBermasBbdsgConsulta.php';
        }
        //---------------------------------------------------------
        // OBSERVAÇÕES

        if ($pg == 'observacoes') {
            include_once 'observacoes.php';
        }
        //----------PATOLOGIAS------------------------------------
       
        if ($pg == 'tabpatologias') {
            include_once '../tabelas/tabPatologias.php';
        }
        if ($pg == 'estradas_patologias') {
            include_once '../tabelas/tabPatologiasListEstradas.php';
        }
        
         if ($pg == 'patologias_itens') {
            include_once '../tabelas/tabPatologiaItens_2.php';
        }
         if ($pg == 'consultas_patolog') {
            include_once '../tabelas/tabPatologiasConsulta.php';
        }
        //-----------OCORRÊNCIAS-----------------------------------
        
        if ($pg == 'tabocorrencias') {
            include_once '../tabelas/tabOcorrencias.php';
        }
         if ($pg == 'consultas_ocorr') {
            include_once '../tabelas/tabOcorrenciasConsulta.php';
        }
        //---------------TRECHOS------------------------------------
        
        if ($pg == 'tabtrecho') {
            include_once '../tabelas/tabTrecho.php';
        }
        if ($pg == 'consultas_trecho') {
            include_once '../tabelas/tabTrechoConsulta.php';
        }
        //------------------IRI----------------------------------
        
         if ($pg == 'tabiri') {
            include_once '../tabelas/tabIRI.php';
        }
         if ($pg == 'consultas_iri') {
            include_once '../tabelas/tabIRIConsulta.php';
        }
        //------------------IQ------------------------------------
        
        if ($pg == 'tabiq') {
            include_once '../tabelas/tabIQ.php';
        }
        if ($pg == 'consultas_iq') {
            include_once '../tabelas/tabIQConsulta.php';
        }
        //------------------POSTOS DE CONTAGEM--------------------
        
        if ($pg == 'tabpcont') {
            include_once '../tabelas/tabPContagem.php';
        }
         if ($pg == 'consultas_pcont') {
            include_once '../tabelas/tabPContagemConsulta.php';
        }
        //---------------------CONTAGEM DE TRÁFEGO--------------------- 
       
        if ($pg == 'tabctrafego') {
            include_once '../tabelas/tabCTrafego.php';
        }
        if ($pg == 'consultas_ctrafego') {
            include_once '../tabelas/tabCTrafegoConsulta.php';
        }
        ?>
    </body>
</html>
