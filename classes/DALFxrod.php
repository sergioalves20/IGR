<?php

require_once 'Conexao.php';
require_once 'Fxrod.php';

class DALFxrod {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($fxrod) {

        $sql = "INSERT INTO tbl_fxrod (alt,reg, id_estrada, data, hora, pkinicio, altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,nvias,largv1,largv2,largv3,largv4,largv5,largv6, ass)VALUES('";
        $sql = $sql . $fxrod->getAlt() . "','";
        $sql = $sql . $fxrod->getReg() . "','";
        $sql = $sql . $fxrod->getId_estrada() . "','";
        $sql = $sql . $fxrod->getData() . "','";
        $sql = $sql . $fxrod->getHora() . "','";
        $sql = $sql . $fxrod->getPkinicio() . "','";
        $sql = $sql . $fxrod->getAltitd_pki() . "','";
        $sql = $sql . $fxrod->getLat_ci() . "','";
        $sql = $sql . $fxrod->getLat_ni() . "','";
        $sql = $sql . $fxrod->getLong_ci() . "','";
        $sql = $sql . $fxrod->getLong_ni() . "','";
        $sql = $sql . $fxrod->getPkfim() . "','";
        $sql = $sql . $fxrod->getAltitd_pkf() . "','";
        $sql = $sql . $fxrod->getLat_cf() . "','";
        $sql = $sql . $fxrod->getLat_nf() . "','";
        $sql = $sql . $fxrod->getLong_cf() . "','";
        $sql = $sql . $fxrod->getLong_nf() . "','";
        $sql = $sql . $fxrod->getNvias() . "','";
        $sql = $sql . $fxrod->getLarg1() . "','";
        $sql = $sql . $fxrod->getLarg2() . "','";
        $sql = $sql . $fxrod->getLarg3() . "','";
        $sql = $sql . $fxrod->getLarg4() . "','";
        $sql = $sql . $fxrod->getLarg5() . "','";
        $sql = $sql . $fxrod->getLarg6() . "','";
        $sql = $sql . $fxrod->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($fxrod) {
        $sql = "UPDATE tbl_fxrod SET alt = '" . $fxrod->getAlt() .
                "',reg = '" . $fxrod->getReg() .
                "',id_estrada = '" . $fxrod->getId_estrada() .
                "',data = '" . $fxrod->getData() .
                "',hora = '" . $fxrod->getHora() .
                "',pkinicio = '" . $fxrod->getPkinicio() .
                "',altitd_pki = '" . $fxrod->getAltitd_pki() .
                "',lat_ci = '" . $fxrod->getLat_ci() .
                "',lat_ni = '" . $fxrod->getLat_ni() .
                "',long_ci = '" . $fxrod->getLong_ci() .
                "',long_ni = '" . $fxrod->getLong_ni() .
                "',pkfim = '" . $fxrod->getPkfim() .
                "',altitd_pkf = '" . $fxrod->getAltitd_pkf() .
                "',lat_cf = '" . $fxrod->getLat_cf() .
                "',lat_nf = '" . $fxrod->getLat_nf() .
                "',long_cf = '" . $fxrod->getLong_cf() .
                "',long_nf = '" . $fxrod->getLong_nf() .
                "',nvias = '" . $fxrod->getNvias() .
                "',largv1 = '" . $fxrod->getLarg1() .
                "',largv2 = '" . $fxrod->getLarg2() .
                "',largv3 = '" . $fxrod->getLarg3() .
                "',largv4 = '" . $fxrod->getLarg4() .
                "',largv5 = '" . $fxrod->getLarg5() .
                "',largv6 = '" . $fxrod->getLarg6() .
                "',ass = '" . $fxrod->getAss() . "'WHERE id_fxrod =" . $fxrod->GetId_fxrod();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($fxrod) {
        $sql = "DELETE FROM tbl_fxrod WHERE id_fxrod =  $fxrod";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_fxrod WHERE  data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function TabFxrod($fxrod){
         $sql = "SELECT * FROM tbl_fxrod WHERE id_estrada = '$fxrod' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function CarregaFxrod($cod) {
        $sql = "SELECT * FROM tbl_fxrod WHERE id_fxrod = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrod = new Fxrod($registo['id_fxrod'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['nvias'],$registo['largv1'],$registo['largv2'],$registo['largv3'],$registo['largv4'],$registo['largv5'],$registo['largv6'],$registo['ass']);
        $this->conexao->desconectar();
        return $fxrod;
    }
    public function ListaEstradas() {
        $sql = "SELECT tbl_fxrod.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_fxrod INNER JOIN tbl_estrada ON tbl_fxrod.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_fxrod.alt = 0 AND tbl_fxrod.arq = 0
        GROUP BY tbl_fxrod.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      
     //----------------------------RECTIFICAR--------------------------------------------------
    
     public function CarregaFxrodRect($cod) {
        $sql = "SELECT * FROM tbl_fxrod WHERE id_fxrod = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $fxrod = new Fxrod($registo['id_fxrod'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['nvias'],$registo['largv1'],$registo['largv2'],$registo['largv3'],$registo['largv4'],$registo['largv5'],$registo['largv6'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $fxrod;
    }
     public function LocalizarRect($fxrod) {
        $sql = "SELECT * FROM tbl_fxrod WHERE id_estrada = '$fxrod' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($fxrod) {
        $sql = "UPDATE tbl_fxrod SET alt = '" . $fxrod->getAlt() .
                "',reg = '" . $fxrod->getReg() .
                "',id_estrada = '" . $fxrod->getId_estrada() .
                "',data = '" . $fxrod->getData() .
                "',hora = '" . $fxrod->getHora() .
                "',pkinicio = '" . $fxrod->getPkinicio() .
                "',altitd_pki = '" . $fxrod->getAltitd_pki() .
                "',lat_ci = '" . $fxrod->getLat_ci() .
                "',lat_ni = '" . $fxrod->getLat_ni() .
                "',long_ci = '" . $fxrod->getLong_ci() .
                "',long_ni = '" . $fxrod->getLong_ni() .
                "',pkfim = '" . $fxrod->getPkfim() .
                "',altitd_pkf = '" . $fxrod->getAltitd_pkf() .
                "',lat_cf = '" . $fxrod->getLat_cf() .
                "',lat_nf = '" . $fxrod->getLat_nf() .
                "',long_cf = '" . $fxrod->getLong_cf() .
                "',long_nf = '" . $fxrod->getLong_nf() .
                "',nvias = '" . $fxrod->getNvias() .
                "',largv1 = '" . $fxrod->getLarg1() .
                "',largv2 = '" . $fxrod->getLarg2() .
                "',largv3 = '" . $fxrod->getLarg3() .
                "',largv4 = '" . $fxrod->getLarg4() .
                "',largv5 = '" . $fxrod->getLarg5() .
                "',largv6 = '" . $fxrod->getLarg6() .
                "',arq = '" . $fxrod->getArq() .
                "',data_arq = '" . $fxrod->GetData_arq(). "'WHERE id_fxrod =" . $fxrod->GetId_fxrod();
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelFxrod(){
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_fxrod.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antao' AND tbl_fxrod.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_fxrod.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_fxrod.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_fxrod.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_fxrod.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_fxrod.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_fxrod.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_fxrod.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrod.*
        FROM tbl_estrada INNER JOIN tbl_fxrod ON tbl_estrada.id_estrada = tbl_fxrod.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_fxrod.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //-----------------------------------------------
    
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
