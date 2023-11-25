<?php
require_once 'Conexao.php';
require_once 'FxrodBase.php';

class DALFxrodBase {
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
 
      function Inserir($fxrodbase) {

        $sql = "INSERT INTO tbl_fxrodbase (alt, reg, id_fxrod, id_estrada, data, hora, pkinicio, pkfim,via, natgeo, granul, espess, ass) VALUES ('";
        $sql = $sql . $fxrodbase->getAlt() . "','";
        $sql = $sql . $fxrodbase->getReg() . "','";
        $sql = $sql . $fxrodbase->getId_fxrod() . "','";       
        $sql = $sql . $fxrodbase->getId_estrada() . "','";
        $sql = $sql . $fxrodbase->getData() . "','";
        $sql = $sql . $fxrodbase->getHora() . "','";
        $sql = $sql . $fxrodbase->getPkinicio() . "','";
        $sql = $sql . $fxrodbase->getPkfim() . "','";
        $sql = $sql . $fxrodbase->getVia() . "','";
        $sql = $sql . $fxrodbase->getNatgeo() . "','";
        $sql = $sql . $fxrodbase->getGranul() . "','";
        $sql = $sql . $fxrodbase->getEspess() . "','";
        $sql = $sql . $fxrodbase->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($fxrodbase) {

        $sql = "UPDATE tbl_fxrodbase SET alt = '" . $fxrodbase->getAlt() .
                "',reg = '" . $fxrodbase->getReg() .
                "',id_fxrod = '" . $fxrodbase->getId_fxrod() .              
                "',id_estrada = '" . $fxrodbase->getId_estrada() .
                "',data = '" . $fxrodbase->getData() .
                "',hora = '" . $fxrodbase->getHora() .
                "',pkinicio = '" . $fxrodbase->getPkinicio() .
                "',pkfim = '" . $fxrodbase->getPkfim() .
                "',via = '" . $fxrodbase->getVia() .
                "',natgeo = '" . $fxrodbase->getNatgeo() .
                "',granul = '" . $fxrodbase->getGranul() .
                "',espess = '" . $fxrodbase->getEspess() .
                "',ass = '" . $fxrodbase->getAss() . "'WHERE id_fxrodbase =" . $fxrodbase->getId_fxrodbase();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($fxrodbase) {
        $sql = "DELETE FROM tbl_fxrodbase WHERE id_fxrodbase = $fxrodbase";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_fxrodbase WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_fxrodbase WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabFxrodBase($fxrodbase) {
        $sql = "SELECT * FROM tbl_fxrodbase WHERE id_estrada = '$fxrodbase' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaFxrodbase($cod) {
        $sql = "SELECT * FROM tbl_fxrodbase WHERE id_fxrodbase = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrodbase = new Fxrodbase($registo['id_fxrodbase'],$registo['alt'],$registo['reg'], $registo['id_estrada'],$registo['id_fxrod'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['via'],$registo['natgeo'],$registo['granul'],$registo['espess'],$registo['ass']);
        $this->conexao->desconectar();
        return $fxrodbase;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
