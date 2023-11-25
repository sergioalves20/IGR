<?php

require_once 'Conexao.php';
require_once 'BermasBbdsg.php';

class DALBermasbbdsg {
   private $conexao;
   
   public function __construct($conexao) {
       $this->conexao = $conexao;
   }

    function Inserir($bermasbbdsg) {
        $sql = "INSERT INTO tbl_bermasbbdsg (alt,reg, id_berma, id_estrada, data, hora, pkinicio, pkfim, granul, espess,betume, sentido, ass) VALUES ('";                                         
        $sql = $sql . $bermasbbdsg->getAlt(). "','";
        $sql = $sql . $bermasbbdsg->getReg(). "','";
        $sql = $sql . $bermasbbdsg->getId_berma() . "','";      
        $sql = $sql . $bermasbbdsg->getId_estrada() . "','";
        $sql = $sql . $bermasbbdsg->getData() . "','";
        $sql = $sql . $bermasbbdsg->getHora() . "','";
        $sql = $sql . $bermasbbdsg->getPkinicio() . "','";
        $sql = $sql . $bermasbbdsg->getPkfim() . "','";
        $sql = $sql . $bermasbbdsg->getGranul() . "','";
        $sql = $sql . $bermasbbdsg->getEspess() . "','";
        $sql = $sql . $bermasbbdsg->getBetume() . "','";
        $sql = $sql . $bermasbbdsg->getSentido() . "','";
        $sql = $sql . $bermasbbdsg->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermasbbdsg) {  
        $sql = "UPDATE tbl_bermasbbdsg SET alt = '" . $bermasbbdsg->getAlt() .
                "',reg = '" . $bermasbbdsg->getReg().
                "',id_berma = '" . $bermasbbdsg->getId_berma().
                "',id_estrada = '" . $bermasbbdsg->getId_estrada() .
                "',data = '" . $bermasbbdsg->getData() .
                "',hora = '" . $bermasbbdsg->getHora() .
                "',pkinicio = '" . $bermasbbdsg->getPkinicio() .
                "',pkfim = '" . $bermasbbdsg->getPkfim() .
                "',granul = '" . $bermasbbdsg->getGranul().
                "',espess = '" . $bermasbbdsg->getEspess().
                 "',betume = '" . $bermasbbdsg->getBetume().
                "',sentido = '" . $bermasbbdsg->getSentido() .
                "',ass = '" . $bermasbbdsg->getAss() . "'WHERE id_bermabbdsg =" . $bermasbbdsg->getId_bermabbdsg();
         echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermasbbdsg) {
        $sql = "DELETE FROM tbl_bermasbbdsg WHERE id_bermabbdsg = $bermasbbdsg";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_bermasbbdsg WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_bermasbbdsg WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabBermasBbdsg($bermasbbdsg) {
        $sql = "SELECT * FROM tbl_bermasbbdsg WHERE id_estrada = '$bermasbbdsg' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaBermasbbdsg($cod) {
        $sql = "SELECT * FROM tbl_bermasbbdsg WHERE id_bermabbdsg = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermasbbdsg = new Bermasbbdsg($registo['id_bermabbdsg'],$registo['alt'],$registo['reg'],$registo['id_berma'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['granul'],$registo['espess'],$registo['betume'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $bermasbbdsg;
    }

   
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
