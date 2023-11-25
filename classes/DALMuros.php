<?php

require_once 'Conexao.php';
require_once 'Muros.php';

class DALMuros {

    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    function Inserir($muros) {
        $sql = "INSERT INTO tbl_muros (alt, reg, id_estrada, data, hora, pkinicio,
                 altitd_pki, lat_ci, lat_ni, long_ci, long_ni, pkfim, altitd_pkf, lat_cf, lat_nf, long_cf, long_nf, nat, altura, espess, sentido, ass) VALUES ('";
        $sql = $sql . $muros->getAlt() . "','";
        $sql = $sql . $muros->getReg() . "','";
        $sql = $sql . $muros->getId_estrada() . "','";
        $sql = $sql . $muros->getData() . "','";
        $sql = $sql . $muros->getHora() . "','";
        $sql = $sql . $muros->getPkinicio() . "','";
        $sql = $sql . $muros->getAltitd_pki() . "','";
        $sql = $sql . $muros->getLat_ci() . "','";
        $sql = $sql . $muros->getLat_ni() . "','";
        $sql = $sql . $muros->getLong_ci() . "','";
        $sql = $sql . $muros->getLong_ni() . "','";
        $sql = $sql . $muros->getPkfim() . "','";
        $sql = $sql . $muros->getAltitd_pkf() . "','";
        $sql = $sql . $muros->getLat_cf() . "','";
        $sql = $sql . $muros->getLat_nf() . "','";
        $sql = $sql . $muros->getLong_cf() . "','";
        $sql = $sql . $muros->getLong_nf() . "','";
        $sql = $sql . $muros->getNat() . "','";
        $sql = $sql . $muros->getAltura() . "','";
        $sql = $sql . $muros->getEspess() . "','";
        $sql = $sql . $muros->getSentido() . "','";
        $sql = $sql . $muros->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($muros) {
        $sql = "UPDATE tbl_muros SET alt = '" . $muros->getAlt() .
                "',reg = '" . $muros->getReg() .
                "',id_estrada = '" . $muros->getId_estrada() .
                "',data = '" . $muros->getData() .
                "',hora = '" . $muros->getHora() .
                "',pkinicio = '" . $muros->getPkinicio() .
                "',altitd_pki = '" . $muros->getAltitd_pki() .
                "',lat_ci = '" . $muros->getLat_ci() .
                "',lat_ni = '" . $muros->getLat_ni() .
                "',long_ci = '" . $muros->getLong_ci() .
                "',long_ni = '" . $muros->getLong_ni() .
                "',pkfim = '" . $muros->getPkfim() .
                "',altitd_pkf = '" . $muros->getAltitd_pkf() .
                "',lat_cf = '" . $muros->getLat_cf() .
                "',lat_nf = '" . $muros->getLat_nf() .
                "',long_cf = '" . $muros->getLong_cf() .
                "',long_nf = '" . $muros->getLong_nf() .
                "',nat = '" . $muros->getNat() .
                "',altura = '" . $muros->getAltura() .
                "',espess = '" . $muros->getEspess() .
                "',sentido = '" . $muros->getSentido() .
                "',ass = '" . $muros->getAss() . "'WHERE id_muro =" . $muros->getId_muro();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($muros) {
        $sql = "DELETE FROM tbl_muros WHERE id_muro = $muros";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Localizar($muros) {
        $sql = "SELECT * FROM tbl_muros WHERE nat like '%" . $muros . "%'AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function TabMuros($muros) {
        $sql = "SELECT * FROM tbl_muros WHERE id_estrada = '$muros' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaMuros($cod) {
        $sql = "SELECT * FROM tbl_muros WHERE id_muro = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $muros = new Muros($registo['id_muro'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],
                $registo['altitd_pki'], $registo['lat_ci'], $registo['lat_ni'], $registo['long_ci'], $registo['long_ni'],
                $registo['pkfim'], $registo['altitd_pkf'], $registo['lat_cf'], $registo['lat_nf'], $registo['long_cf'], $registo['long_nf'],
                $registo['nat'], $registo['altura'], $registo['espess'], $registo['sentido'], $registo['ass']);
        $this->conexao->desconectar();
        return $muros;
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_muros.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_muros INNER JOIN tbl_estrada ON tbl_muros.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_muros.alt = 0 AND tbl_muros.arq = 0
        GROUP BY tbl_muros.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     //----------------------------RECTIFICAR--------------------------------------------------
    
     public function CarregaMurosRect($cod) {
        $sql = "SELECT * FROM tbl_muros WHERE id_muro = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $muros = new Muros($registo['id_muro'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],
                $registo['altitd_pki'], $registo['lat_ci'], $registo['lat_ni'], $registo['long_ci'], $registo['long_ni'],
                $registo['pkfim'], $registo['altitd_pkf'], $registo['lat_cf'], $registo['lat_nf'], $registo['long_cf'], $registo['long_nf'],
                $registo['nat'], $registo['altura'], $registo['espess'], $registo['sentido'], $registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $muros;
    }
     public function LocalizarRect($muros) {
        $sql = "SELECT * FROM tbl_muros WHERE id_estrada = '$muros' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function Rectificar($muros) {
        $sql = "UPDATE tbl_muros SET alt = '" . $muros->getAlt() .
                "',reg = '" . $muros->getReg() .
                "',id_estrada = '" . $muros->getId_estrada() .
                "',data = '" . $muros->getData() .
                "',hora = '" . $muros->getHora() .
                "',pkinicio = '" . $muros->getPkinicio() .
                "',altitd_pki = '" . $muros->getAltitd_pki() .
                "',lat_ci = '" . $muros->getLat_ci() .
                "',lat_ni = '" . $muros->getLat_ni() .
                "',long_ci = '" . $muros->getLong_ci() .
                "',long_ni = '" . $muros->getLong_ni() .
                "',pkfim = '" . $muros->getPkfim() .
                "',altitd_pkf = '" . $muros->getAltitd_pkf() .
                "',lat_cf = '" . $muros->getLat_cf() .
                "',lat_nf = '" . $muros->getLat_nf() .
                "',long_cf = '" . $muros->getLong_cf() .
                "',long_nf = '" . $muros->getLong_nf() .
                "',nat = '" . $muros->getNat() .
                "',altura = '" . $muros->getAltura() .
                "',espess = '" . $muros->getEspess() .
                "',sentido = '" . $muros->getSentido() .
                "',arq = '" . $muros->getArq() .
                "',data_arq = '" . $muros->getData_arq() . "'WHERE id_muro =" . $muros->getId_muro();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
   //--------------------------- EXCEL ----------------------------------------
    
   public function ExportExcelMuros(){
        $sql = "SELECT tbl_estrada.freguesia,tbl_estrada.codigo, tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_muros.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antao' AND tbl_muros.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_muros.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_muros.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_muros.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_muros.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_muros.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_muros.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_muros.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_muros.*
        FROM tbl_estrada INNER JOIN tbl_muros ON tbl_estrada.id_estrada = tbl_muros.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_muros.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
