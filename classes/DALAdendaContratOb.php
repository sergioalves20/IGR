<?php

require_once 'Conexao.php';
require_once 'AdendaContratOb.php';

class DALAdendaContratOb {

    private $conexao;

    public function __construct($conexao) {
        $this->setConexao($conexao);
    }

    public function Inserir($adctob) {
       
        $sql = "INSERT INTO tbl_adendactob (id_contratobra,datai,dataf,datass,val,just,ass)VALUES('";
       
        $sql = $sql . $adctob->getId_contratobra() . "','";
        $sql = $sql . $adctob->getDatai() . "','";
        $sql = $sql . $adctob->getDataf() . "','";
        $sql = $sql . $adctob->getDatass() . "','";
        $sql = $sql . $adctob->getVal() . "','";
        $sql = $sql . $adctob->getJust() . "','";
        $sql = $sql . $adctob->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($adctob) {

        $sql = "UPDATE tbl_adendactob SET id_contratobra = '" . $adctob->getId_contratobra() .
                "',datai = '" . $adctob->getDatai() .
                "',dataf = '" . $adctob->getDataf() .
                "',datass = '" . $adctob->getDatass() .
                "',val = '" . $adctob->getVal() . 
                "',datass = '" . $adctob->getDatass() .
                "',just = '" . $adctob->getJust() . "'WHERE id_adendactob =" . $adctob->getId_adendactob();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($adctob) {
        $sql = "DELETE FROM tbl_adendactob WHERE id_adendactob = $adctob";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_adendactob";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaAdendaco($cod) {
        $sql = "SELECT * FROM tbl_adendactob WHERE id_adendactob = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $aconto = new AdendaContratOb($registo['id_adendactob'],$registo['id_contratobra'],$registo['datai'],$registo['dataf'],$registo['datass'],$registo['val'],$registo['just'],['ass']);                                              
        $this->conexao->desconectar();
        return $aconto;
    } 
    public function cmbContratOb() {

        $sql = "SELECT * FROM tbl_contratobra";
        
         echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function getConexao() {
        return $this->conexao;
    }
    public function setConexao($conexao){
        $this->conexao = $conexao;
    }
}
