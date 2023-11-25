<?php

require_once 'Conexao.php';
require_once 'FxrodFund.php';

class DALFxrodFund {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($fxrodfund) {

        $sql = "INSERT INTO tbl_fxrodfund (alt,reg, id_estrada, id_fxrod, data, hora, pkinicio, pkfim, via, natgeo, cbr, ass) VALUES ('";
        $sql = $sql . $fxrodfund->getAlt() . "','";
        $sql = $sql . $fxrodfund->getReg() . "','";
        $sql = $sql . $fxrodfund->getId_estrada() . "','";
        $sql = $sql . $fxrodfund->getId_fxrod() . "','";
        $sql = $sql . $fxrodfund->getData() . "','";
        $sql = $sql . $fxrodfund->getHora() . "','";
        $sql = $sql . $fxrodfund->getPkinicio() . "','";
        $sql = $sql . $fxrodfund->getPkfim() . "','";
        $sql = $sql . $fxrodfund->getVia() . "','";
        $sql = $sql . $fxrodfund->getNatgeo() . "','";
        $sql = $sql . $fxrodfund->getCbr() . "','";
        $sql = $sql . $fxrodfund->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($fxrodfund) {

        $sql = "UPDATE tbl_fxrodfund SET alt = '" . $fxrodfund->getAlt() .
                "',reg = '" . $fxrodfund->getReg() .
                "',id_estrada = '" . $fxrodfund->getId_estrada() .
                "',id_fxrod = '" . $fxrodfund->getId_fxrod() .
                "',data = '" . $fxrodfund->getData() .
                "',hora = '" . $fxrodfund->getHora() .
                "',pkinicio = '" . $fxrodfund->getPkinicio() .
                "',pkfim = '" . $fxrodfund->getPkfim() .
                "',via = '" . $fxrodfund->getVia() .
                "',natgeo = '" . $fxrodfund->getNatgeo() .
                "',cbr = '" . $fxrodfund->getCbr() .
                "',ass = '" . $fxrodfund->getAss() . "'WHERE id_fxrodfund =" . $fxrodfund->getId_fxrodfund();
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($fxrodfund) {
        $sql = "DELETE FROM tbl_fxrodfund WHERE id_fxrodfund = $fxrodfund";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        
        $sql = "SELECT * FROM tbl_fxrodfund WHERE  data = CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_fxrodfund WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabFxrodfund($fxrodfund) {
        $sql = "SELECT * FROM tbl_fxrodfund WHERE id_estrada = '$fxrodfund' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaFxrodfund($cod) {
        $sql = "SELECT * FROM tbl_fxrodfund WHERE id_fxrodfund = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrodfund = new Fxrodfund($registo['id_fxrodfund'],$registo['alt'],$registo['reg'], $registo['id_estrada'],$registo['id_fxrod'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['via'],$registo['natgeo'],$registo['cbr'],$registo['ass']);
        $this->conexao->desconectar();
        return $fxrodfund;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
