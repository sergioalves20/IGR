<?php

require_once 'Conexao.php';
require_once 'AdendaContratoFz.php';

class DALAdendaContratoFz {

    private $conexao;

    public function __construct($conexao) {
        $this->setConexo($conexao);
    }

    public function Inserir($adcontfz) {

        $sql = "INSERT INTO tbl_adendactfz (id_contratfiz, datai, dataf, datass,val,just,ass)VALUES('";       
        $sql = $sql . $adcontfz->getId_contratfiz() . "','";
        $sql = $sql . $adcontfz->getDatai() . "','";
        $sql = $sql . $adcontfz->getDataf() . "','";
        $sql = $sql . $adcontfz->getDatass() . "','";
        $sql = $sql . $adcontfz->getVal() . "','";       
        $sql = $sql . $adcontfz->getJust() . "','";
        $sql = $sql . $adcontfz->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($adcontfz) {
        $sql = "UPDATE tbl_adendactfz SET id_contratfiz = '" . $adcontfz->getId_contratfiz() .
                "',datai = '" . $adcontfz->getDatai() .
                "',dataf = '" . $adcontfz->getDataf() .
                "',datass = '" . $adcontfz->getDatass() .
                "',val = '" . $adcontfz->getVal() .            
                "',just = '" . $adcontfz->getJust() .
                "',ass = '" . $adcontfz->getAss() . "'WHERE id_adendactfiz =" . $adcontfz->getId_adendactfiz();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($adcontfz) {
        $sql = "DELETE FROM tbl_adendactfz WHERE id_adendactfiz = $adcontfz";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_adendactfz";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function CarregaAdendacf($cod) {
        $sql = "SELECT * FROM tbl_adendactfz WHERE id_adendactfiz = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $acontf = new AdendaContratoFz($registo['id_adendactfiz'],$registo['id_contratfiz'],$registo['datai'],$registo['dataf'],$registo['datass'],$registo['val'],$registo['just'],['ass']);                                              
        $this->conexao->desconectar();
        return $acontf;
    } 
    public function cmbContratFiz() {
        
         $sql = "SELECT tbl_contratfiz.id_contratfiz,tbl_empreitada.id_empreitada, tbl_empreitada.nome
                FROM tbl_empreitada INNER JOIN tbl_contratfiz ON tbl_empreitada.id_empreitada = tbl_contratfiz.id_empreitada";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexo($conexao) {
        $this->conexao = $conexao;
    }

}
