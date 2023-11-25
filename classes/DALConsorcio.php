<?php
require_once 'Conexao.php';
require_once 'Consorcio.php';

class DALConsorcio {
     private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($cons) {

        $sql = "INSERT INTO tbl_consorcio (id_concurso,empresa, lider,ass)VALUES('";       
        $sql = $sql . $cons->getId_concurso() . "','";
        $sql = $sql . $cons->getEmpresa() . "','";
        $sql = $sql . $cons->getLider() . "','";
        $sql = $sql . $cons->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($cons) {

        $sql = "UPDATE tbl_consorcio SET id_concurso = '" . $cons->getId_concurso() .
                "',empresa = '" . $cons->getEmpresa() . 
                "',lider = '" . $cons->getLider() .
                 "',ass = '" . $cons->getAss() . "'WHERE id_consorcio =" . $cons->getId_consorcio();
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($cons) {
        $sql = "DELETE FROM tbl_consorcio WHERE id_consorcio = $cons";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_consorcio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaConsorcio($cod) {
        $sql = "SELECT * FROM tbl_consorcio WHERE id_consorcio = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $cons= new Consorcio($registo['id_consorcio'],$registo['id_concurso'],$registo['empresa'],$registo['lider'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $cons;
    }
    
      public function cmbEmpresa() {
        $sql = "SELECT * FROM tbl_empresa";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function cmbConcurso() {
        $sql = "SELECT tbl_concurso.id_concurso,tbl_empreitada.nome
                FROM tbl_empreitada INNER JOIN tbl_concurso ON tbl_empreitada.id_empreitada = tbl_concurso.id_empreitada";       
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