<?php

require_once 'Conexao.php';
require_once 'Fxrodbblig.php';

class DALFxrodbblig {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($fxrodbblig) {

        $sql = "INSERT INTO tbl_fxrodbblig (alt, reg, id_fxrod, id_estrada, data, hora, pkinicio, pkfim,via, granul, espess, betume, ass) VALUES ('";
        $sql = $sql . $fxrodbblig->getAlt() . "','";
        $sql = $sql . $fxrodbblig->getReg() . "','";
        $sql = $sql . $fxrodbblig->getId_fxrod() . "','";
        $sql = $sql . $fxrodbblig->getId_estrada() . "','";
        $sql = $sql . $fxrodbblig->getData() . "','";
        $sql = $sql . $fxrodbblig->getHora() . "','";
        $sql = $sql . $fxrodbblig->getPkinicio() . "','";
        $sql = $sql . $fxrodbblig->getPkfim() . "','";
        $sql = $sql . $fxrodbblig->getVia() . "','";
        $sql = $sql . $fxrodbblig->getGranul() . "','";
        $sql = $sql . $fxrodbblig->getEspess() . "','";
        $sql = $sql . $fxrodbblig->getBetume() . "','";
        $sql = $sql . $fxrodbblig->getAss() . "')";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($fxrodbblig) {

        $sql = "UPDATE tbl_fxrodbblig SET alt = '" . $fxrodbblig->getAlt() .
                "',reg = '" . $fxrodbblig->getReg() .
                "',id_fxrod = '" . $fxrodbblig->getId_fxrod() .
                "',id_estrada = '" . $fxrodbblig->getId_estrada() .
                "',data = '" . $fxrodbblig->getData() .
                "',hora = '" . $fxrodbblig->getHora() .
                "',pkinicio = '" . $fxrodbblig->getPkinicio() .
                "',pkfim = '" . $fxrodbblig->getPkfim() .
                "',via = '" . $fxrodbblig->getVia() .
                "',granul = '" . $fxrodbblig->getGranul() .
                "',espess = '" . $fxrodbblig->getEspess() .
                "',betume = '" . $fxrodbblig->getBetume() .
                "',ass = '" . $fxrodbblig->getAss() . "'WHERE id_fxrodbblig =" . $fxrodbblig->getId_fxrodbblig();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($fxrodbblig) {
        $sql = "DELETE FROM tbl_fxrodbblig WHERE id_fxrodbblig = $fxrodbblig";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_fxrodbblig WHERE  data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
 public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_fxrodbblig WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabFxrodBblig($fxrodbblig) {
        $sql = "SELECT * FROM tbl_fxrodbblig WHERE id_estrada = '$fxrodbblig' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaFxrodbblig($cod) {
        $sql = "SELECT * FROM tbl_fxrodbblig WHERE id_fxrodbblig = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrodbblig = new Fxrodbblig($registo['id_fxrodbblig'],$registo['alt'],$registo['reg'],$registo['id_fxrod'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['via'],$registo['granul'],$registo['espess'],$registo['betume'],$registo['ass']);
        $this->conexao->desconectar();
        return $fxrodbblig;
    }
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
