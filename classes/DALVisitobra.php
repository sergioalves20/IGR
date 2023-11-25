<?php
require_once 'Conexao.php';
require_once 'Visitobra.php';

class DALVisitobra {
  
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
}

function Inserir($visit) {
        $sql = "INSERT INTO tbl_visitobra (data,hora,id_intervencao,executada,pkinicio,pkfim,quant,obsrv,foto1,foto2,ass) VALUES ('";
        $sql = $sql . $visit->getData() . "','";
        $sql = $sql . $visit->getHora() . "','";
        $sql = $sql . $visit->getId_intervencao() . "','";      
        $sql = $sql . $visit->getExecutada() . "','";
        $sql = $sql . $visit->getPkinicio() . "','";
        $sql = $sql . $visit->getPkfim() . "','";
        $sql = $sql . $visit->getQuant() . "','";
        $sql = $sql . $visit->getObsrv() . "','";
        $sql = $sql . $visit->getFoto1() . "','";
        $sql = $sql . $visit->getFoto2() . "','";
        $sql = $sql . $visit->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    
    public function Alterar($visit) {
        $sql = "UPDATE tbl_visitobra SET data = '" . $visit->getData() .
                "',hora = '" . $visit->getHora() .
                "',id_intervencao = '" . $visit->getId_intervencao() .
                "',executada = '" . $visit->getExecutada() .
                "',pkinicio = '" . $visit->getPkinicio() .
                "',pkfim = '" . $visit->getPkfim() .
                "',quant = '" . $visit->getQuant() .
                "',obsrv = '" . $visit->getObsrv() .
                "',foto1 = '" . $visit->getFoto1() .
                "',foto2 = '" . $visit->getFoto2() .
                "',ass = '" . $visit->getAss() . "'WHERE id_visitobra =" . $visit->getId_visitobra();
    //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($visit) {
        $sql = "DELETE FROM tbl_visitobra WHERE id_visitobra = $visit";
    //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_visitobra";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaVisitobra($cod) {
        $sql = "SELECT * FROM tbl_visitobra WHERE id_visitobra = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $visit = new Visitobra($registo['id_visitobra'],$registo['data'], $registo['hora'],$registo['id_intervencao'],$registo['executada'],$registo['pkinicio'],$registo['pkfim'],$registo['quant'],$registo['obsrv'],$registo['foto1'],$registo['foto2'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $visit;
    }
      public function cmbIntervencao() {       
     $sql = "SELECT tbl_intervencao.id_intervencao, tbl_objconcurso.id_concurso, tbl_intervencao.id_proposta, tbl_objconcurso.id_estrada, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_intervencao.pkinicio, tbl_intervencao.pkfim, tbl_intervencao.sentido, tbl_intervencao.quant
     FROM tbl_objconcurso INNER JOIN tbl_intervencao ON tbl_objconcurso.id_objconcurso = tbl_intervencao.id_objconcurso";
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




