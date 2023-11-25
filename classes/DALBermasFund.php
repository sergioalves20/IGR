<?php

require_once 'Conexao.php';
require_once 'BermasFund.php';

class DALBermasfund {
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
 function Inserir($bermasfund) {
   
        $sql = "INSERT INTO tbl_bermasfund (alt, reg, id_berma,id_estrada,  data, hora, pkinicio, pkfim, natgeo, cbr, sentido, ass) VALUES ('";
        $sql = $sql . $bermasfund->getAlt() . "','";
        $sql = $sql . $bermasfund->getReg() . "','";
        $sql = $sql . $bermasfund->getId_berma() . "','";
        $sql = $sql . $bermasfund->getId_estrada() . "','";
        $sql = $sql . $bermasfund->getData() . "','";
        $sql = $sql . $bermasfund->getHora() . "','";
        $sql = $sql . $bermasfund->getPkinicio() . "','";
        $sql = $sql . $bermasfund->getPkfim() . "','";
        $sql = $sql . $bermasfund->getNatgeo() . "','";
        $sql = $sql . $bermasfund->getCbr() . "','";
        $sql = $sql . $bermasfund->getSentido() . "','";
        $sql = $sql . $bermasfund->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermasfund) {

        $sql = "UPDATE tbl_bermasfund SET alt = '" . $bermasfund->getAlt() .
                "',reg = '" . $bermasfund->getReg() .
                 "',id_berma = '" . $bermasfund->getId_berma() . 
                "',id_estrada = '" . $bermasfund->getId_estrada() .  
                "',data = '" . $bermasfund->getData() .
                "',hora = '" . $bermasfund->getHora() .
                "',pkinicio = '" . $bermasfund->getPkinicio() .
                "',pkfim = '" . $bermasfund->getPkfim() .
                "',natgeo = '" . $bermasfund->getNatgeo() .
                "',cbr = '" . $bermasfund->getCbr() .
                "',sentido = '" . $bermasfund->getSentido() .
                "',ass = '" . $bermasfund->getAss() . "'WHERE id_bermafund =" . $bermasfund->getId_bermafund();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermasfund) {
        $sql = "DELETE FROM tbl_bermasfund WHERE id_bermafund = $bermasfund";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

   public function Localizar() {
        
        $sql = "SELECT * FROM tbl_bermasfund WHERE  data = CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {
        
        $sql = "SELECT * FROM tbl_bermasfund WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabBermasfund($bermasfund) {
        $sql = "SELECT * FROM tbl_bermasfund WHERE id_estrada = '$bermasfund' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaBermasfund($cod) {
        $sql = "SELECT * FROM tbl_bermasfund WHERE id_bermafund = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermasfund = new Bermasfund($registo['id_bermafund'],$registo['alt'],$registo['reg'], $registo['id_berma'],$registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'],$registo['natgeo'],$registo['cbr'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $bermasfund;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
