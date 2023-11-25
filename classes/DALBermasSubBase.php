<?php

require_once 'Conexao.php';
require_once 'BermasSubBase.php';

class DALBermasSubBase {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($bermasubbase) {

        $sql = "INSERT INTO tbl_bermasubbase (alt,reg, id_berma, id_estrada, data, hora, pkinicio, pkfim, natgeo, granul, espess, sentido, ass) VALUES ('";
        $sql = $sql . $bermasubbase->getAlt() . "','";
        $sql = $sql . $bermasubbase->getReg() . "','";
        $sql = $sql . $bermasubbase->getId_berma() . "','";
        $sql = $sql . $bermasubbase->getId_estrada() . "','";
        $sql = $sql . $bermasubbase->getData() . "','";
        $sql = $sql . $bermasubbase->getHora() . "','";
        $sql = $sql . $bermasubbase->getPkinicio() . "','";
        $sql = $sql . $bermasubbase->getPkfim() . "','";
        $sql = $sql . $bermasubbase->getNatgeo() . "','";
        $sql = $sql . $bermasubbase->getGranul() . "','";
        $sql = $sql . $bermasubbase->getEspess() . "','";
        $sql = $sql . $bermasubbase->getSentido() . "','";
        $sql = $sql . $bermasubbase->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermasubbase) {

        $sql = "UPDATE tbl_bermasubbase SET alt = '" . $bermasubbase->getAlt() .
                "',reg = '" . $bermasubbase->getReg() .
                "',id_berma = '" . $bermasubbase->getId_berma() .
                "',id_estrada = '" . $bermasubbase->getId_estrada() .
                "',data = '" . $bermasubbase->getData() .
                "',hora = '" . $bermasubbase->getHora() .
                "',pkinicio = '" . $bermasubbase->getPkinicio() .
                "',pkfim = '" . $bermasubbase->getPkfim() .
                "',natgeo = '" . $bermasubbase->getNatgeo() .
                "',granul = '" . $bermasubbase->getGranul() .
                "',espess = '" . $bermasubbase->getEspess() .
                "',sentido = '" . $bermasubbase->getSentido() .
                "',ass = '" . $bermasubbase->getAss() . "'WHERE id_bermasubbase =" . $bermasubbase->getId_bermasubbase();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermasubbase) {
        $sql = "DELETE FROM tbl_bermasubbase WHERE id_bermasubbase = $bermasubbase";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

  public function Localizar() {
        
        $sql = "SELECT * FROM tbl_bermasubbase WHERE  data = CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_bermasubbase WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabBermasubbase($bermasubbase) {
        $sql = "SELECT * FROM tbl_bermasubbase WHERE id_estrada = '$bermasubbase' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaBermasubbase($cod) {
        $sql = "SELECT * FROM tbl_bermasubbase WHERE id_bermasubbase = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermasubbase = new BermasSubBase($registo['id_bermasubbase'],$registo['alt'],$registo['reg'], $registo['id_estrada'],$registo['id_berma'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['natgeo'],$registo['granul'],$registo['espess'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $bermasubbase;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
