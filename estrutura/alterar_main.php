<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar</title>               
    </head>
    <body>       
        <?php
        $op="";
        $pg="alterar";        
        if (filter_input(INPUT_GET,'pg')){
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');
        }       
       //ALTERAÇÕES       
        if ($pg == 'info') {
            include_once '../alterar/info.php';       
        }
         if ($pg == 'alterar') {
            include_once 'alterar.php';       
        }
         if($pg == 'sair'){
             include_once 'login_admin.php'; 
         }       
         //Elementos da estrada
         if ($pg == 'singularidade') {
            include_once '../alterar/altSingularidade.php';       
        }
        
        if ($pg == 'intersecao') {
            include_once '../alterar/altIntersecao.php';
        }
        
        if ($pg == 'muros') {
            include_once '../alterar/altMuro.php';
        }
       
        if ($pg == 'phidraulica') {
            include_once '../alterar/altPhidraulica.php';
        }
      
        if ($pg == 'talude') {
            include_once '../alterar/altTalude.php';
        }
         
        if ($pg == 'banqueta') {
            include_once '../alterar/altBanqueta.php';
        }
       
        if ($pg == 'curvap') {
            include_once '../alterar/altCurvasPlanta.php';
        }
         
        if ($pg == 'curvav') {
            include_once '../alterar/altCurvasVerticais.php';
        }
    
       // Perfis Transversais 

        if ($pg == 'fxrod') {
            include_once '../alterar/altFxrod.php';
        }
        
        if ($pg == 'bermas') {
            include_once '../alterar/altBermas.php';
        }
       
        if ($pg == 'drensupf') {
            include_once '../alterar/altDrensupf.php';
        }
       
        if ($pg == 'sepcentral') {
            include_once '../alterar/altSepCentral.php';
        }
       
        
        // Equipamentos de Segurança 
          if ($pg == 'guardseg') {
            include_once '../alterar/altGuardSeg.php';
        }
         
        if ($pg == 'sinalhz') {
            include_once '../alterar/altSinalHorizontal.php';
        }
        
        if ($pg == 'marcadores') {
            include_once '../alterar/altMarcadores.php';
        }
        
        if ($pg == 'sinalvt') {
            include_once '../alterar/altSinalVertical.php';
        }
         
        if ($pg == 'delineadores') {
            include_once '../alterar/altDelineadores.php';
        }
       
        // Tipo de Pavimento 

        if ($pg == 'fxrodtipo') {
            include_once '../alterar/altFxrodTipo.php';
        }
         
        
        if ($pg == 'bermatipo') {
            include_once '../alterar/altBermasTipo.php';
        }
       

       // Constituição da Faixa de Rodagem 

        if ($pg == 'constfxrod') {
            include_once 'constFxrod.php';
        }
        
        if ($pg == 'fxrodfund') {
            include_once '../alterar/altFxrodFund.php';    
        }
       
        /*------------------------------------------*/
        if ($pg == 'fxrodbase') {
            include_once '../alterar/altFxrodBase.php';
        }
        
        /*-------------------------------------------*/
        if ($pg == 'fxrodsubbase') {
            include_once '../alterar/altFxrodSubbase.php';
        }
       
        /*--------------------------------------------*/
        if ($pg == 'fxrodbblig') {
            include_once '../alterar/altFxrodBblig.php';
        }
      
        /*----------------------------------------------*/
        if ($pg == 'fxrodbbdsg') {
            include_once '../alterar/altFxrodBbdsg.php';
        }
        
        //--------------------------------------------------
       // Constituição das Bermas 

        if ($pg == 'constbermas') {
            include_once 'constBerma.php';
        }
        //------------FUNDAÇÃO BERMA------------------------------------
        if ($pg == 'bermasfund') {
            include_once '../alterar/altBermasFund.php';
        }
      
        //-------------SUB BASE BERMA----------------------------------------
        if ($pg == 'bermasubbase') {
            include_once '../alterar/altBermasSubBase.php';
        }
       
        //------------BASE BERMA-----------------------------------------
        if ($pg == 'bermasbase') {
            include_once '../alterar/altBermasBase.php';
        }
      
        //------------BBLigação BERMA-----------------------------------------
        if ($pg == 'bermasbbl') {
            include_once '../alterar/altBermasBblig.php';
        }
       
        //-----------BBDesgaste BERMA----------------------------------------
        if ($pg == 'bermasbbd') {
            include_once '../alterar/altBermasBbdsg.php';
        }
        
        
        //---------------------------------------------------------
        // OBSERVAÇÕES

        if ($pg == 'observacoes') {
            include_once 'observacoes.php';
        }
        //----------PATOLOGIAS------------------------------------
        if ($pg == 'patologia') {
            include_once '../alterar/altPatologia.php';
        }
      
        //-----------OCORRÊNCIAS-----------------------------------
        if ($pg == 'ocorrencia') {
            include_once '../alterar/altOcorrencias.php';
        }
      
        
        //---------------TRECHOS------------------------------------
        if ($pg == 'trecho') {
            include_once '../alterar/altTrecho.php';
        }
       
        //------------------IRI----------------------------------
        if ($pg == 'iri') {
            include_once '../alterar/altIRI.php';
        }
       
        //------------------IQ------------------------------------
        if ($pg == 'iq') {
            include_once '../alterar/altIQ.php';
        }
      
        //------------------POSTOS DE CONTAGEM--------------------
        if ($pg == 'pcont') {
            include_once '../alterar/altPContagem.php';
        }
       
        //---------------------CONTAGEM DE TRÁFEGO---------------------
        if ($pg == 'ctrafego') {
            include_once '../alterar/altCTrafego.php';
        }            
        ?>
    </body>
</html>
