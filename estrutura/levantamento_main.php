<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Levantamento</title>          
    </head>
    <body>
        <?php
        $op="";
        $pg="levantamento";
        if (filter_input(INPUT_GET,'pg')){
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');
        }
       //LEVANTAMENTOS     
         if ($pg == 'levantamento') {
            include_once 'levantamento.php';       
        }
         if($pg == 'sair'){
             include_once 'login_admin.php'; 
         }       
         //Elementos da estrada
         if ($pg == 'singularidade') {
            include_once '../frms/frmSingularidade.php';       
        }
        if ($pg == 'tabsingularidade') {
            include_once '../tabelas/tabSingularidade.php';       
        }
        if ($pg == 'intersecao') {
            include_once '../frms/frmIntersecao.php';
        }
         if ($pg == 'tabintersecao') {
            include_once '../tabelas/tabIntersecao.php';
        }
        if ($pg == 'muros') {
            include_once '../frms/frmMuro.php';
        }
        if ($pg == 'tabmuros') {
            include_once '../tabelas/tabMuros.php';
        }
        if ($pg == 'phidraulica') {
            include_once '../frms/frmPhidraulica.php';
        }
        if ($pg == 'tabphidraulica') {
            include_once '../tabelas/tabPhidraulica.php';
        }
        if ($pg == 'talude') {
            include_once '../frms/frmTalude.php';
        }
         if ($pg == 'tabtalude') {
            include_once '../tabelas/tabTalude.php';
        }
        if ($pg == 'banqueta') {
            include_once '../frms/frmBanqueta.php';
        }
        if ($pg == 'tabbanqueta') {
            include_once '../tabelas/tabBanqueta.php';
        }
        if ($pg == 'curvap') {
            include_once '../frms/frmCurvasPlanta.php';
        }
         if ($pg == 'tabcurvap') {
            include_once '../tabelas/tabCurvasPlanta.php';
        }
        if ($pg == 'curvav') {
            include_once '../frms/frmCurvasVerticais.php';
        }
        if ($pg == 'tabcurvav') {
            include_once '../tabelas/tabCurvasVerticais.php';
        }
       // Perfis Transversais 
        if ($pg == 'fxrod') {
            include_once '../frms/frmFxrod.php';
        }
         if ($pg == 'tabfxrod') {
            include_once '../tabelas/tabFxrod.php';
        }
        if ($pg == 'bermas') {
            include_once '../frms/frmBermas.php';
        }
        if ($pg == 'tabbermas') {
            include_once '../tabelas/tabBermas.php';
        }
        if ($pg == 'sobra') {
            include_once '../frms/frmSobraEstrada.php';
        }
        if ($pg == 'tabsobra') {
            include_once '../tabelas/tabSobraEstrada.php';
        }
        if ($pg == 'drensupf') {
            include_once '../frms/frmDrensupf.php';
        }
        if ($pg == 'tabdrensupf') {
            include_once '../tabelas/tabDrensupf.php';
        }
        if ($pg == 'sepcentral') {
            include_once '../frms/frmSepCentral.php';
        }
        if ($pg == 'tabsepcentral') {
            include_once '../tabelas/tabSepCentral.php';
        }   
        // Equipamentos de Segurança 
          if ($pg == 'guardseg') {
            include_once '../frms/frmGuardSeg.php';
        }
          if ($pg == 'tabguardseg') {
            include_once '../tabelas/tabGuardSeg.php';
        }
        if ($pg == 'sinalhz') {
            include_once '../frms/frmSinalHorizontal.php';
        }
        if ($pg == 'tabsinalhz') {
            include_once '../tabelas/tabSinalHorizontal.php';
        }
        if ($pg == 'marcadores') {
            include_once '../frms/frmMarcadores.php';
        }
         if ($pg == 'tabmarcadores') {
            include_once '../tabelas/tabMarcadores.php';
        }
        if ($pg == 'sinalvt') {
            include_once '../frms/frmSinalVertical.php';
        }
         if ($pg == 'tabsinalvt') {
            include_once '../tabelas/tabSinalVertical.php';
        }
        if ($pg == 'delineadores') {
            include_once '../frms/frmDelineadores.php';
        }
        if ($pg == 'tabdelineadores') {
            include_once '../tabelas/tabDelineadores.php';
        }
        // Tipo de Pavimento 
        if ($pg == 'fxrodtipo') {
            include_once '../frms/frmFxrodTipo.php';
        }
         if ($pg == 'tabfxrodtipo') {
            include_once '../tabelas/tabFxrodTipo.php';
        }
        
         if ($pg == 'sobratipo') {
            include_once '../frms/frmSobraEstradaTipo.php';
        }
         if ($pg == 'tabsobratipo') {
            include_once '../tabelas/tabSobraEstradaTipo.php';
        }
        if ($pg == 'bermatipo') {
            include_once '../frms/frmBermasTipo.php';
        }
        if ($pg == 'tabbermatipo') {
            include_once '../tabelas/tabBermaTipo.php';
        }
       // Constituição da Faixa de Rodagem 
        if ($pg == 'constfxrod') {
            include_once 'constFxrod.php';
        }       
        if ($pg == 'fxrodfund') {
            include_once '../frms/frmFxrodFund.php';    
        }
        if ($pg == 'tabFxrodfund') {
            include_once '../tabelas/tabFxrodFund.php';
        }
        /*------------------------------------------*/
        if ($pg == 'fxrodbase') {
            include_once '../frms/frmFxrodBase.php';
        }
         if ($pg == 'tabFxrodbase') {
            include_once '../tabelas/tabFxrodBase.php';
        }
        /*-------------------------------------------*/
        if ($pg == 'fxrodsubbase') {
            include_once '../frms/frmFxrodSubbase.php';
        }
         if ($pg == 'tabFxrodsubbase') {
            include_once '../tabelas/tabFxrodSubbase.php';
        }
        /*--------------------------------------------*/
        if ($pg == 'fxrodbblig') {
            include_once '../frms/frmFxrodBblig.php';
        }
        if ($pg == 'tabfxrodbblig') {
            include_once '../tabelas/tabFxrodBblig.php';
        }
        /*----------------------------------------------*/
        if ($pg == 'fxrodbbdsg') {
            include_once '../frms/frmFxrodBbdsg.php';
        }
         if ($pg == 'tabfxrodbbdsg') {
            include_once '../tabelas/tabFxrodBbdsg.php';
        }
        //--------------------------------------------------
       // Constituição das Bermas 
        if ($pg == 'constbermas') {
            include_once 'constBerma.php';
        }
        //------------FUNDAÇÃO BERMA------------------------------------
        if ($pg == 'bermasfund') {
            include_once '../frms/frmBermasFund.php';
        }
        if ($pg == 'tabbermasfund') {
            include_once '../tabelas/tabBermasFund.php';
        }
        //-------------SUB BASE BERMA----------------------------------------
        if ($pg == 'bermasubbase') {
            include_once '../frms/frmBermasSubBase.php';
        }
        if ($pg == 'tabbermasubbase') {
            include_once '../tabelas/tabBermaSubBase.php';
        }
        //------------BASE BERMA-----------------------------------------
        if ($pg == 'bermasbase') {
            include_once '../frms/frmBermasBase.php';
        }
        if ($pg == 'tabbermasbase') {
            include_once '../tabelas/tabBermasBase.php';
        }
        //------------BBLigação BERMA-----------------------------------------
        if ($pg == 'bermasbbl') {
            include_once '../frms/frmBermasBblig.php';
        }
        if ($pg == 'tabbermasbbl') {
            include_once '../tabelas/tabBermasBblig.php';
        }
        //-----------BBDesgaste BERMA----------------------------------------
        if ($pg == 'bermasbbd') {
            include_once '../frms/frmBermasBbdsg.php';
        }
        
         if ($pg == 'tabbermasbbd') {
            include_once '../tabelas/tabBermasBbdsg.php';
        }
        //---------------------------------------------------------
        // OBSERVAÇÕES

        if ($pg == 'observacoes') {
            include_once 'observacoes.php';
        }
        //----------PATOLOGIAS------------------------------------
        if ($pg == 'patologia') {
            include_once '../frms/frmPatologia.php';
        }
        if ($pg == 'tabpatologias') {
            include_once '../tabelas/tabPatologias.php';
        }
         if ($pg == 'patologias_itens') {
            include_once '../tabelas/tabPatologiaItens_1.php';
        }
        //-----------OCORRÊNCIAS-----------------------------------
        if ($pg == 'ocorrencia') {
            include_once '../frms/frmOcorrencias.php';
        }
        if ($pg == 'tabocorrencias') {
            include_once '../tabelas/tabOcorrencias.php';
        }
        
        //---------------TRECHOS------------------------------------
        if ($pg == 'trecho') {
            include_once '../frms/frmTrecho.php';
        }
        if ($pg == 'tabtrecho') {
            include_once '../tabelas/tabTrecho.php';
        }
        //------------------IRI----------------------------------
        if ($pg == 'iri') {
            include_once '../frms/frmIRI.php';
        }
         if ($pg == 'tabiri') {
            include_once '../tabelas/tabIRI.php';
        }
        //------------------IQ------------------------------------
        if ($pg == 'iq') {
            include_once '../frms/frmIQ.php';
        }
        if ($pg == 'tabiq') {
            include_once '../tabelas/tabIQ.php';
        }
        //------------------POSTOS DE CONTAGEM--------------------
        if ($pg == 'pcont') {
            include_once '../frms/frmPContagem.php';
        }
        if ($pg == 'tabpcont') {
            include_once '../tabelas/tabPContagem.php';
        }
        //---------------------CONTAGEM DE TRÁFEGO---------------------
        if ($pg == 'ctrafego') {
            include_once '../frms/frmCTrafego.php';
        }     
       
        if ($pg == 'tabctrafego') {
            include_once '../tabelas/tabCTrafego.php';
        }
        if ($pg == 'usuario') {
            include_once '../frms/frmUsuario.php';
        }     
        ?>
    </body>
</html>
