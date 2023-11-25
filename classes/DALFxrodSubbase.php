<?php

require_once 'Conexao.php';
require_once 'FxrodSubbase.php';

class DALFxrodSubbase {
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
 
      function Inserir($fxrodsubbase) {

        $sql = "INSERT INTO tbl_fxrodsubbase (alt, reg, id_fxrod, id_estrada, data, hora, pkinicio, pkfim,via, natgeo, granul, espess, ass) VALUES ('";
        $sql = $sql . $fxrodsubbase->getAlt() . "','";
        $sql = $sql . $fxrodsubbase->getReg() . "','";
        $sql = $sql . $fxrodsubbase->getId_fxrod() . "','";       
        $sql = $sql . $fxrodsubbase->getId_estrada() . "','";
        $sql = $sql . $fxrodsubbase->getData() . "','";
        $sql = $sql . $fxrodsubbase->getHora() . "','";
        $sql = $sql . $fxrodsubbase->getPkinicio() . "','";
        $sql = $sql . $fxrodsubbase->getPkfim() . "','";
        $sql = $sql . $fxrodsubbase->getVia() . "','";
        $sql = $sql . $fxrodsubbase->getNatgeo() . "','";
        $sql = $sql . $fxrodsubbase->getGranul() . "','";
        $sql = $sql . $fxrodsubbase->getEspess() . "','";
        $sql = $sql . $fxrodsubbase->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($fxrodsubbase) {

        $sql = "UPDATE tbl_fxrodsubbase SET alt = '" . $fxrodsubbase->getAlt() .
                "',reg = '" . $fxrodsubbase->getReg() .
                "',id_fxrod = '" . $fxrodsubbase->getId_fxrod() .              
                "',id_estrada = '" . $fxrodsubbase->getId_estrada() .
                "',data = '" . $fxrodsubbase->getData() .
                "',hora = '" . $fxrodsubbase->getHora() .
                "',pkinicio = '" . $fxrodsubbase->getPkinicio() .
                "',pkfim = '" . $fxrodsubbase->getPkfim() .
                "',via = '" . $fxrodsubbase->getVia() .
                "',natgeo = '" . $fxrodsubbase->getNatgeo() .
                "',granul = '" . $fxrodsubbase->getGranul() .
                "',espess = '" . $fxrodsubbase->getEspess() .
                "',ass = '" . $fxrodsubbase->getAss() . "'WHERE id_fxrodsubbase =" . $fxrodsubbase->getId_fxrodsubbase();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($fxrodsubbase) {
        $sql = "DELETE FROM tbl_fxrodsubbase WHERE id_fxrodsubbase = $fxrodsubbase";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_fxrodsubbase WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_fxrodsubbase WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabFxrodsubbase($fxrodsubbase) {
        $sql = "SELECT * FROM tbl_fxrodsubbase WHERE id_estrada = '$fxrodsubbase' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaFxrodsubbase($cod) {
        $sql = "SELECT * FROM tbl_fxrodsubbase WHERE id_fxrodsubbase = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrodsubbase = new Fxrodsubbase($registo['id_fxrodsubbase'],$registo['alt'],$registo['reg'], $registo['id_estrada'],$registo['id_fxrod'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['via'],$registo['natgeo'],$registo['granul'],$registo['espess'],$registo['ass']);
        $this->conexao->desconectar();
        return $fxrodsubbase;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
