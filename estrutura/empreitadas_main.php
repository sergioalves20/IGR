<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Empreitadas</title>          
    </head>
    <body>
        <?php
        $op="";
        $pg="empreitadas";
        if (filter_input(INPUT_GET,'pg')){
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');
        }
       //EMPREITADAS
         if($pg == 'sair'){
             include_once 'login_admin.php';
         }
         if ($pg == 'empreitada') {
            include_once '../empreitadas/frmEmpreitadas.php';       
        }
         if ($pg == 'registo') {
            include_once '../empreitadas/frmEmpreitadas.php';       
        }
        if ($pg == 'motivo') {
            include_once '../empreitadas/frmMotivo.php';       
        }
        if ($pg == 'concurso') {
            include_once '../empreitadas/frmConcurso.php';       
        }
         if ($pg == 'juri') {
            include_once '../empreitadas/frmJuri.php';       
        }
        if ($pg == 'objconcurso') {
            include_once '../empreitadas/frmObjetoConcurso.php';       
        }
        if ($pg == 'propostas') {
            include_once '../empreitadas/frmProposta.php';       
        }
         if ($pg == 'empresas') {
            include_once '../empreitadas/frmEmpresa.php';       
        }
        if ($pg == 'consorcio') {
            include_once '../empreitadas/frmConsorcio.php';       
        } 
         if ($pg == 'intervencao') {
            include_once '../empreitadas/frmIntervencao.php';       
        }
        if ($pg == 'contratobra') {
            include_once '../empreitadas/frmContratobra.php';       
        }
         if ($pg == 'adendactob') {
            include_once '../empreitadas/frmAdendaContratob.php';       
        }
        if ($pg == 'contratfiz') {
            include_once '../empreitadas/frmContratfiz.php';       
        }
        if ($pg == 'adendactfz') {
            include_once '../empreitadas/frmAdendaContratfiz.php';       
        }
         if ($pg == 'visitobra') {
            include_once '../empreitadas/frmVisitobra.php';       
        }
        if ($pg == 'orcamento') {
            include_once '../empreitadas/frmOrcamento.php';       
        }
        if ($pg == 'orcamentodet') {
            include_once '../empreitadas/frmOrcamentodet.php';       
        }
        
         if ($pg == 'itensorcamento') {
            include_once '../empreitadas/itensorcamento.php';       
        }
        if ($pg == 'precomedio') {
            include_once '../empreitadas/tabPrecoMedio.php';       
        }
        ?>
    </body>
</html>
