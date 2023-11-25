<?php

require_once 'Conexao.php';
require_once 'Bermasbblig.php';

class DALBermasbblig {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($bermasbblig) {
        $sql = "INSERT INTO tbl_bermasbblig (alt, reg, id_berma, id_estrada, data, hora, pkinicio, pkfim, granul, espess,betume, sentido, ass) VALUES ('";
        $sql = $sql . $bermasbblig->getAlt() . "','";
        $sql = $sql . $bermasbblig->getReg() . "','";
        $sql = $sql . $bermasbblig->getId_berma() . "','";
        $sql = $sql . $bermasbblig->getId_estrada() . "','";
        $sql = $sql . $bermasbblig->getData() . "','";
        $sql = $sql . $bermasbblig->getHora() . "','";
        $sql = $sql . $bermasbblig->getPkinicio() . "','";
        $sql = $sql . $bermasbblig->getPkfim() . "','";
        $sql = $sql . $bermasbblig->getGranul() . "','";
        $sql = $sql . $bermasbblig->getEspess() . "','";
        $sql = $sql . $bermasbblig->getBetume() . "','";
        $sql = $sql . $bermasbblig->getSentido() . "','";
        $sql = $sql . $bermasbblig->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermasbblig) {

        $sql = "UPDATE tbl_bermasbblig SET alt = '" . $bermasbblig->getAlt() .
                "',reg = '" . $bermasbblig->getReg() .
                "',id_berma = '" . $bermasbblig->getId_berma() .
                "',id_estrada = '" . $bermasbblig->getId_estrada() .
                "',data = '" . $bermasbblig->getData() .
                "',hora = '" . $bermasbblig->getHora() .
                "',pkinicio = '" . $bermasbblig->getPkinicio() .
                "',pkfim = '" . $bermasbblig->getPkfim() .
                "',granul = '" . $bermasbblig->getGranul() .
                "',espess = '" . $bermasbblig->getEspess() .
                "',betume = '" . $bermasbblig->getBetume() .
                "',sentido = '" . $bermasbblig->getSentido() .
                "',ass = '" . $bermasbblig->getAss() . "'WHERE id_bermabblig =" . $bermasbblig->getId_bermabblig();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermasbblig) {
        $sql = "DELETE FROM tbl_bermasbblig WHERE id_bermabblig = $bermasbblig";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

   public function Localizar() {
        $sql = "SELECT * FROM tbl_bermasbblig WHERE  data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
 public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_bermasbblig WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabBermasBblig($bermasbblig) {
        $sql = "SELECT * FROM tbl_bermasbblig WHERE id_estrada = '$bermasbblig' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaBermasbblig($cod) {
        $sql = "SELECT * FROM tbl_bermasbblig WHERE id_bermabblig = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermasbblig = new Bermasbblig($registo['id_bermabblig'],$registo['alt'],$registo['reg'],$registo['id_berma'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['granul'],$registo['espess'],$registo['betume'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $bermasbblig;
    }
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
