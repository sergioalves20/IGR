<?php

require_once 'Conexao.php';
require_once 'BermasBase.php';

class DALBermasBase {
    
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function Inserir($bermasbase) {
       
        $sql = "INSERT INTO tbl_bermasbase (alt,reg, id_berma, id_estrada, data, hora, pkinicio, pkfim, natgeo, granul, espess, sentido, ass) VALUES ('";                                         
        $sql = $sql . $bermasbase->getAlt(). "','";
        $sql = $sql . $bermasbase->getReg(). "','";
        $sql = $sql . $bermasbase->getId_berma() . "','";
        $sql = $sql . $bermasbase->getId_estrada() . "','";
        $sql = $sql . $bermasbase->getData() . "','";
        $sql = $sql . $bermasbase->getHora() . "','";
        $sql = $sql . $bermasbase->getPkinicio() . "','";
        $sql = $sql . $bermasbase->getPkfim() . "','";
        $sql = $sql . $bermasbase->getNatgeo() . "','";
        $sql = $sql . $bermasbase->getGranul() . "','";
        $sql = $sql . $bermasbase->getEspess() . "','";
        $sql = $sql . $bermasbase->getSentido() . "','";
        $sql = $sql . $bermasbase->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermasbase) {
       
        $sql = "UPDATE tbl_bermasbase SET alt = '" . $bermasbase->getAlt() .
                "',reg = '" . $bermasbase->getReg().
                "',id_berma = '" . $bermasbase->getId_berma().
                "',id_estrada = '" . $bermasbase->getId_estrada() .
                "',data = '" . $bermasbase->getData() .
                "',hora = '" . $bermasbase->getHora() .
                "',pkinicio = '" . $bermasbase->getPkinicio() .
                "',pkfim = '" . $bermasbase->getPkfim() .
                "',natgeo = '" . $bermasbase->getNatgeo().
                "',granul = '" . $bermasbase->getGranul().
                "',espess = '" . $bermasbase->getEspess().
                "',sentido = '" . $bermasbase->getSentido() .
                "',ass = '" . $bermasbase->getAss() . "'WHERE id_bermabase =" . $bermasbase->getId_bermabase();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermasbase) {
        $sql = "DELETE FROM tbl_bermasbase WHERE id_bermabase = $bermasbase";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

   public function Localizar() {
        
        $sql = "SELECT * FROM tbl_bermasbase WHERE  data = CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_bermasbase WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabBermasbase($bermasbase) {
        $sql = "SELECT * FROM tbl_bermasbase WHERE id_estrada = '$bermasbase' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaBermasbase($cod) {
        $sql = "SELECT * FROM tbl_bermasbase WHERE id_bermabase = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermasbase = new BermasBase($registo['id_bermabase'],$registo['alt'],$registo['reg'], $registo['id_estrada'],$registo['id_berma'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['natgeo'],$registo['granul'],$registo['espess'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $bermasbase;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
