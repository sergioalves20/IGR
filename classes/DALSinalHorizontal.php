<?php

require_once 'Conexao.php';
require_once 'SinalHorizontal.php';

class DALSinalHorizontal {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($sinalhz) {

        $sql = "INSERT INTO tbl_sinalhz (alt,reg, id_estrada, data, hora, pkinicio, altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,sinalhz, ass)VALUES('";
        $sql = $sql . $sinalhz->getAlt() . "','";
        $sql = $sql . $sinalhz->getReg() . "','";
        $sql = $sql . $sinalhz->getId_estrada() . "','";
        $sql = $sql . $sinalhz->getData() . "','";
        $sql = $sql . $sinalhz->getHora() . "','";
        $sql = $sql . $sinalhz->getPkinicio() . "','";
        $sql = $sql . $sinalhz->getAltitd_pki() . "','";
        $sql = $sql . $sinalhz->getLat_ci() . "','";
        $sql = $sql . $sinalhz->getLat_ni() . "','";
        $sql = $sql . $sinalhz->getLong_ci() . "','";
        $sql = $sql . $sinalhz->getLong_ni() . "','";
        $sql = $sql . $sinalhz->getPkfim() . "','";
        $sql = $sql . $sinalhz->getAltitd_pkf() . "','";
        $sql = $sql . $sinalhz->getLat_cf() . "','";
        $sql = $sql . $sinalhz->getLat_nf() . "','";
        $sql = $sql . $sinalhz->getLong_cf() . "','";
        $sql = $sql . $sinalhz->getLong_nf() . "','";
        $sql = $sql . $sinalhz->getSinalhz() . "','";
        $sql = $sql . $sinalhz->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($sinalhz) {
        $sql = "UPDATE tbl_sinalhz SET alt = '" . $sinalhz->getAlt() .
                "',reg = '" . $sinalhz->getReg() .
                "',id_estrada = '" . $sinalhz->getId_estrada() .             
                "',data = '" . $sinalhz->getData() .
                "',hora = '" . $sinalhz->getHora() .
                "',pkinicio = '" . $sinalhz->getPkinicio() .
                "',altitd_pki = '" . $sinalhz->getAltitd_pki() . 
                "',lat_ci = '" . $sinalhz->getLat_ci() . 
                "',lat_ni = '" . $sinalhz->getLat_ni() . 
                "',long_ci = '" . $sinalhz->getLong_ci() .
                "',long_ni = '" . $sinalhz->getLong_ni() . 
                "',pkfim = '" . $sinalhz->getPkfim() . 
                "',altitd_pkf = '" . $sinalhz->getAltitd_pkf() . 
                "',lat_cf = '" . $sinalhz->getLat_cf() . 
                "',lat_nf = '" . $sinalhz->getLat_nf() . 
                "',long_cf = '" . $sinalhz->getLong_cf() . 
                "',long_nf = '" . $sinalhz->getLong_nf() .
                "',sinalhz = '" . $sinalhz->getSinalhz() .
                "',ass = '" . $sinalhz->getAss() . "'WHERE id_sinalhz =" . $sinalhz->GetId_sinalhz();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($sinalhz) {
        $sql = "DELETE FROM tbl_sinalhz WHERE id_sinalhz = $sinalhz";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($sinalhz) {
        $sql = "SELECT * FROM tbl_sinalhz WHERE sinalhz =  '$sinalhz' AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function TabSinalHorizontal($sinalhz) {
        $sql = "SELECT * FROM tbl_sinalhz WHERE id_estrada = '$sinalhz' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function CarregaSinalhz($cod) {
        $sql = "SELECT * FROM tbl_sinalhz WHERE id_sinalhz = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $sinalhz = new SinalHorizontal ($registo['id_sinalhz'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['sinalhz'], $registo['ass']);
        $this->conexao->desconectar();
        return $sinalhz;
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_sinalhz.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_sinalhz INNER JOIN tbl_estrada ON tbl_sinalhz.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_sinalhz.alt = 0 AND tbl_sinalhz.arq = 0
        GROUP BY tbl_sinalhz.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    
    public function CarregaSinalhzRect($cod) {
        $sql = "SELECT * FROM tbl_sinalhz WHERE id_sinalhz = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $sinalhz = new SinalHorizontal ($registo['id_sinalhz'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['sinalhz'], $registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $sinalhz;
    }
     public function LocalizarRect($sinalhz) {
        $sql = "SELECT * FROM tbl_sinalhz WHERE id_estrada = '$sinalhz' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($sinalhz) {
        $sql = "UPDATE tbl_sinalhz SET alt = '" . $sinalhz->getAlt() .
                "',reg = '" . $sinalhz->getReg() .
                "',id_estrada = '" . $sinalhz->getId_estrada() .             
                "',data = '" . $sinalhz->getData() .
                "',hora = '" . $sinalhz->getHora() .
                "',pkinicio = '" . $sinalhz->getPkinicio() .
                "',altitd_pki = '" . $sinalhz->getAltitd_pki() . 
                "',lat_ci = '" . $sinalhz->getLat_ci() . 
                "',lat_ni = '" . $sinalhz->getLat_ni() . 
                "',long_ci = '" . $sinalhz->getLong_ci() .
                "',long_ni = '" . $sinalhz->getLong_ni() . 
                "',pkfim = '" . $sinalhz->getPkfim() . 
                "',altitd_pkf = '" . $sinalhz->getAltitd_pkf() . 
                "',lat_cf = '" . $sinalhz->getLat_cf() . 
                "',lat_nf = '" . $sinalhz->getLat_nf() . 
                "',long_cf = '" . $sinalhz->getLong_cf() . 
                "',long_nf = '" . $sinalhz->getLong_nf() .
                "',sinalhz = '" . $sinalhz->getSinalhz() .
                 "',arq = '" . $sinalhz->getArq() .
                "',data_arq = '" . $sinalhz->GetData_arq(). "'WHERE id_sinalhz =" . $sinalhz->GetId_sinalhz();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    //------------------------------------ EXCEL --------------------------------
    
      public function ExportExcelSinalhz(){
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_sinalhz.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antao' AND tbl_sinalhz.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_sinalhz.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_sinalhz.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_sinalhz.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
           $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_sinalhz.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
          $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_sinalhz.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_sinalhz.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
           $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_sinalhz.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_sinalhz.*
        FROM tbl_estrada INNER JOIN tbl_sinalhz ON tbl_estrada.id_estrada = tbl_sinalhz.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_sinalhz.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //----------------------------------------------- 
}
