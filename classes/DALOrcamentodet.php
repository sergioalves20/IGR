<?php
require_once 'Conexao.php';
require_once 'Orcamentodet.php';

class DALOrcamentodet {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($orcdet) {

        $sql = "INSERT INTO tbl_orcamentodet (id_orc,trabalhos,pkinicio,pkfim,cod,quant,preco,ass)VALUES('";
        $sql = $sql . $orcdet->getId_orc() . "','";
        $sql = $sql . $orcdet->getTrabalhos() . "','";      
        $sql = $sql . $orcdet->getPkinicio() . "','";
        $sql = $sql . $orcdet->getPkfim() . "','";
        $sql = $sql . $orcdet->getCod() . "','";
        $sql = $sql . $orcdet->getQuant() . "','";
        $sql = $sql . $orcdet->getPreco() . "','";
        $sql = $sql . $orcdet->getAss() . "')";
       //echo $sql; 
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($orcdet) {
        $sql = "UPDATE tbl_orcamentodet SET id_orc = '" . $orcdet->getId_orc() .
                "',trabalhos = '" . $orcdet->getTrabalhos() .
                "',pkinicio = '" . $orcdet->getPkinicio() .
                "',pkfim = '" . $orcdet->getPkfim() .
                "',cod = '" . $orcdet->getCod() .
                "',quant = '" . $orcdet->getQuant() .
                "',preco = '" . $orcdet->getPreco() .
                "',ass = '" . $orcdet->getAss() . "' WHERE id_orcdet =" . $orcdet->getId_orcdet();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);   
        $this->conexao->desconectar();
    }

    public function Excluir($orcdet) {
        $sql = "DELETE FROM tbl_orcamentodet WHERE id_orcdet = $orcdet";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_orcamentodet";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaOrcamentodet($cod) {
        $sql = "SELECT * FROM tbl_orcamentodet WHERE id_orcdet = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $orcdet = new Orcamentodet($registo['id_orcdet'],$registo['id_orc'],$registo['trabalhos'],$registo['pkinicio'],$registo['pkfim'],$registo['cod'],$registo['quant'],$registo['preco'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $orcdet;
    } 
    
    public function cmbItens() {
        $sql = "SELECT * FROM tbl_orcamentoitens ORDER BY cod";       
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function cmbOrc() {
        $sql = "SELECT * FROM tbl_orcamento";       
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function cmbTrabalhos() {
        $sql = "SELECT * FROM tbl_trabalhos";       
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

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}

