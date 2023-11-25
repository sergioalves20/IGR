<?php

require_once 'Conexao.php';
require_once 'OrcamentoItens.php';

class DALOrcamentoItens {

    private $conexao;

    function Inserir($item) {
        $sql = "INSERT INTO tbl_orcamentoitens (cod,descr,und)VALUES ('";
        $sql = $sql . $item->getCod() . "','";
        $sql = $sql . $item->getDescr() . "','";
        $sql = $sql . $item->getUnd() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($item) {

        $sql = "UPDATE tbl_orcamentoitens SET cod = '" . $item->getCod() .
                "',descr = '" . $item->getDescr() .
                "',und = '" . $item->getUnd() . "'WHERE id_orc =" . $item->getId_orc();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     function orcamentoItens(){
          $sql = "SELECT * FROM  tbl_orcamentoitens";
          $banco = $this->conexao->getBanco();
          $banco->query('SET NAMES utf8');
          $retorno = $banco->query($sql);
          $this->conexao->desconectar();
          return $retorno;              
         }
      public function CarregaItem($cod) {
        $sql = "SELECT * FROM tbl_orcamentoitens WHERE id_orc = '$cod' ORDER BY cod";                 
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $item = new OrcamentoItens($registo['id_orc'],$registo['cod'],$registo['descr'],$registo['und']);                                              
        $this->conexao->desconectar();
        return $item;
    }             
         

    public function Excluir($item) {
        $sql = "DELETE FROM tbl_orcamentoitens WHERE id_orc = $item";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_orcamentoitens";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function OcarmantoCap() {
        $sql = "SELECT * FROM tbl_orcamentocap";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function OcarmantoCap1() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '01' And '01.07'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function OcarmantoCap2() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '02' And '02.11'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function OcarmantoCap3() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '03' And '03.09'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    
     }
      public function OcarmantoCap4() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '04' And '04.07'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function OcarmantoCap5() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '05' And '05.09'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function OcarmantoCap6() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '06' And '06.10'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function OcarmantoCap7() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '07' And '07.09'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function OcarmantoCap8() {
        
        $sql = "SELECT tbl_orcamentoitens.id_orc, tbl_orcamentoitens.cod, tbl_orcamentoitens.descr, tbl_orcamentoitens.und
               FROM tbl_orcamentoitens
               WHERE (((tbl_orcamentoitens.cod) Between '08' And '08.09'))";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function getConexao() {
        return $this->conexao;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
