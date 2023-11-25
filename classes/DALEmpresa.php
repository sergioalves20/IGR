<?php

require_once 'Conexao.php';
require_once 'Empresa.php';

class DALEmpresa {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($empresa) {

        $sql = "INSERT INTO tbl_empresa (nome,alvara, nif, nac,endereco, email, tel1,cont1,  tel2, cont2, tel3,cont3,ass)VALUES('";       
        $sql = $sql . $empresa->getNome() . "','";
        $sql = $sql . $empresa->getAlvara() . "','";
        $sql = $sql . $empresa->getNif() . "','";
        $sql = $sql . $empresa->getNac() . "','";
        $sql = $sql . $empresa->getEndereco() . "','";
        $sql = $sql . $empresa->getEmail() . "','";
        $sql = $sql . $empresa->getTel1() . "','";
        $sql = $sql . $empresa->getCont1() . "','";
        $sql = $sql . $empresa->getTel2() . "','";
        $sql = $sql . $empresa->getCont2() . "','";
        $sql = $sql . $empresa->getTel3() . "','";
        $sql = $sql . $empresa->getCont3() . "','";
        $sql = $sql . $empresa->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($empresa) {

        $sql = "UPDATE tbl_empresa SET nome = '" . $empresa->getNome() .
                 "',alvara = '" . $empresa->getAlvara() .
                 "',nif = '" . $empresa->getNif() .
                 "',nac = '" . $empresa->getNac() .
                 "',endereco = '" . $empresa->getEndereco() .
                 "',email = '" . $empresa->getEmail() .
                 "',tel1 = '" . $empresa->getTel1() .
                 "',cont1 = '" . $empresa->getCont1() .                
                 "',tel2 = '" . $empresa->getTel2() .
                 "',cont2 = '" . $empresa->getCont2() .
                 "',tel3 = '" . $empresa->getTel3() .
                 "',cont3 = '" . $empresa->getCont3() .
                 "',ass = '" . $empresa->getAss() . "'WHERE id_empresa =" . $empresa->getId_empresa();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($empresa) {
        $sql = "DELETE FROM tbl_empresa WHERE id_empresa = $empresa";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_empresa";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaEmpresa($cod) {
        $sql = "SELECT * FROM tbl_empresa WHERE id_empresa = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $empresa= new Empresa($registo['id_empresa'],$registo['nome'],$registo['alvara'],$registo['nif'],$registo['nac'],$registo['endereco'],$registo['email'],
                $registo['tel1'],$registo['cont1'],
                $registo['tel2'],$registo['cont2'],
                $registo['tel3'],$registo['cont3'],
                $registo['ass']);                                              
        $this->conexao->desconectar();
        return $empresa;
    } 

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
