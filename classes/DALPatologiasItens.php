<?php

require_once 'Conexao.php';
require_once 'PatologiasItens.php';

class DALPatologiasItens  {
    
    private $conexao;
     
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($item) {
        
        $sql = "INSERT INTO tbl_patologiaitens (id_grupo,nivel,patologia,descr) VALUES ('";
        $sql = $sql . $item->getId_grupo()."','";
        $sql = $sql . $item->getNivel() ."','";
        $sql = $sql . $item->getPatologia() . "','";
        $sql = $sql . $item->getDescr() . "')";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($item) {
       
        $sql = "UPDATE tbl_patologiaitens SET id_grupo = '" . $item->getId_grupo() .
                "',nivel = '" . $item->getNivel() .
                "',patologia = '" . $item->getPatologia() .
                "',descr = '" . $item->getDescr() . "'WHERE id_item =" . $item->getId_item();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($patologItem) {
        $sql = "DELETE FROM tbl_patologiaitens WHERE id_item = $patologItem";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_patologiaitens";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
   public function Listar($patologias) {
        $sql = "SELECT * FROM tbl_patologiaitens WHERE id_item like '%".$patologias."%'";
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function patologia($grupo){
        $sql = "SELECT tbl_patologiaitens.id_item, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
        FROM tbl_patologiagrupo INNER JOIN tbl_patologiaitens ON tbl_patologiagrupo.id_grupo = tbl_patologiaitens.id_grupo WHERE grupo ='".$grupo."'";
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
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
        $sql = "SELECT * FROM tbl_patologiaitens WHERE id_item = '$cod' ORDER BY id_item";                 
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $item = new PatologiasItens($registo['id_item'],$registo['id_grupo'],$registo['nivel'],$registo['patologia'],$registo['descr']);                                              
        $this->conexao->desconectar();
        return $item;
    }         
    function getConexao() {
        return $this->conexao;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
