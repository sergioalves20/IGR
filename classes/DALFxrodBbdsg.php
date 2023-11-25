<?php

require_once 'Conexao.php';
require_once 'Fxrodbbdsg.php';

class DALFxrodbbdsg {

    private $conexao;
    function Inserir($fxrodbbdsg) {
        $sql = "INSERT INTO tbl_fxrodbbdsg (alt,reg, id_fxrod, id_estrada, data, hora, pkinicio, pkfim, via, granul, espess,betume, ass) VALUES ('";
        $sql = $sql . $fxrodbbdsg->getAlt() . "','";
        $sql = $sql . $fxrodbbdsg->getReg() . "','";
        $sql = $sql . $fxrodbbdsg->getId_fxrod() . "','";
        $sql = $sql . $fxrodbbdsg->getId_estrada() . "','";
        $sql = $sql . $fxrodbbdsg->getData() . "','";
        $sql = $sql . $fxrodbbdsg->getHora() . "','";
        $sql = $sql . $fxrodbbdsg->getPkinicio() . "','";
        $sql = $sql . $fxrodbbdsg->getPkfim() . "','";
        $sql = $sql . $fxrodbbdsg->getVia() . "','";
        $sql = $sql . $fxrodbbdsg->getGranul() . "','";
        $sql = $sql . $fxrodbbdsg->getEspess() . "','";
        $sql = $sql . $fxrodbbdsg->getBetume() . "','";
        $sql = $sql . $fxrodbbdsg->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($fxrodbbdsg) {

        $sql = "UPDATE tbl_fxrodbbdsg SET alt = '" . $fxrodbbdsg->getAlt() .
                "',reg = '" . $fxrodbbdsg->getReg() .
                "',id_fxrod = '" . $fxrodbbdsg->getId_fxrod() .
                "',id_estrada = '" . $fxrodbbdsg->getId_estrada() .
                "',data = '" . $fxrodbbdsg->getData() .
                "',hora = '" . $fxrodbbdsg->getHora() .
                "',pkinicio = '" . $fxrodbbdsg->getPkinicio() .
                "',pkfim = '" . $fxrodbbdsg->getPkfim() .
                "',via = '" . $fxrodbbdsg->getVia() .
                "',granul = '" . $fxrodbbdsg->getGranul() .
                "',espess = '" . $fxrodbbdsg->getEspess() .
                "',betume = '" . $fxrodbbdsg->getBetume() .
                "',ass = '" . $fxrodbbdsg->getAss() . "'WHERE id_fxrodbbdsg =" . $fxrodbbdsg->getId_fxrodbbdsg();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($fxrodbbdsg) {
        $sql = "DELETE FROM tbl_fxrodbbdsg WHERE id_fxrodbbdsg = $fxrodbbdsg";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_fxrodbbdsg WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_fxrodbbdsg WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabFxrodBbdsg($fxrodbbdsg) {
        $sql = "SELECT * FROM tbl_fxrodbbdsg WHERE id_estrada = '$fxrodbbdsg' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaFxrodbbdsg($cod) {
        $sql = "SELECT * FROM tbl_fxrodbbdsg WHERE id_fxrodbbdsg = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrodbbdsg = new Fxrodbbdsg($registo['id_fxrodbbdsg'],$registo['alt'],$registo['reg'], $registo['id_fxrod'],$registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['via'],$registo['granul'],$registo['espess'],$registo['betume'],$registo['ass']);
        $this->conexao->desconectar();
        return $fxrodbbdsg;
    }

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
