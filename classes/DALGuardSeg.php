<?php

require_once 'Conexao.php';
require_once 'GuardSeg.php';

class DALGuardSeg {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($gs) {

        $sql = "INSERT INTO tbl_guardseg (alt,reg, id_estrada, data, hora, pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,guardseg, sentido, ass)VALUES('";

        $sql = $sql . $gs->getAlt() . "','";
        $sql = $sql . $gs->getReg() . "','";
        $sql = $sql . $gs->getId_estrada() . "','";
        $sql = $sql . $gs->getData() . "','";
        $sql = $sql . $gs->getHora() . "','";
        $sql = $sql . $gs->getPkinicio() . "','";
        $sql = $sql . $gs->getAltitd_pki() . "','";
        $sql = $sql . $gs->getLat_ci() . "','";
        $sql = $sql . $gs->getLat_ni() . "','";
        $sql = $sql . $gs->getLong_ci() . "','";
        $sql = $sql . $gs->getLong_ni() . "','";
        $sql = $sql . $gs->getPkfim() . "','";
        $sql = $sql . $gs->getAltitd_pkf() . "','";
        $sql = $sql . $gs->getLat_cf() . "','";
        $sql = $sql . $gs->getLat_nf() . "','";
        $sql = $sql . $gs->getLong_cf() . "','";
        $sql = $sql . $gs->getLong_nf() . "','";
        $sql = $sql . $gs->getGuardseg() . "','";
        $sql = $sql . $gs->getSentido() . "','";
        $sql = $sql . $gs->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();       
       
    }

    public function Alterar($gs) {

        $sql = "UPDATE tbl_guardseg SET alt = '" . $gs->getAlt() .
                "',reg = '" . $gs->getReg() .
                "',id_estrada = '" . $gs->getId_estrada() .
                "',data = '" . $gs->getData() .
                "',hora = '" . $gs->getHora() .
                "',pkinicio = '" . $gs->getPkinicio() .              
                "',altitd_pki = '" .$gs->getAltitd_pki() . 
                "',lat_ci = '" .$gs->getLat_ci() . 
                "',lat_ni = '" .$gs->getLat_ni() . 
                "',long_ci = '" .$gs->getLong_ci() . 
                "',long_ni = '" .$gs->getLong_ni() . 
                "',pkfim = '" .$gs->getPkfim() . 
                "',altitd_pkf = '" .$gs->getAltitd_pkf() .
                "',lat_cf = '" .$gs->getLat_cf() .              
                "',lat_nf = '" .$gs->getLat_nf() .
                "',long_cf = '" .$gs->getLong_cf() . 
                "',long_nf = '" .$gs->getLong_nf() .             
                "',guardseg = '" . $gs->getGuardseg() .
                "',sentido = '" . $gs->getSentido() .
                "',ass = '" . $gs->getAss() . "'WHERE id_guardseg =" . $gs->GetId_guardseg();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($gs) {
        $sql = "DELETE FROM tbl_guardseg WHERE id_guardseg = '$gs'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($gs) {
        $sql = "SELECT * FROM tbl_guardseg WHERE guardseg = '$gs' AND data = CURDATE() ORDER BY pkinicio";
         //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  public function TabGuardseg($gs) {
        $sql = "SELECT * FROM tbl_guardseg WHERE id_estrada = '$gs' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaGuardseg($cod) {
        $sql = "SELECT * FROM tbl_guardseg WHERE id_guardseg = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $gs = new GuardSeg($registo['id_guardseg'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['guardseg'], $registo['sentido']);                                                           
        $this->conexao->desconectar();
        return $gs;
    }
  
      public function ListaEstradas() {
        $sql = "SELECT tbl_guardseg.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_guardseg INNER JOIN tbl_estrada ON tbl_guardseg.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_guardseg.alt = 0 AND tbl_guardseg.arq = 0
        GROUP BY tbl_guardseg.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //--------------------RECTIFICAR-------------------
      public function CarregaGuardsegRect($cod) {
        $sql = "SELECT * FROM tbl_guardseg WHERE id_guardseg = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $gs = new GuardSeg($registo['id_guardseg'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['guardseg'], $registo['sentido'],$registo['arq'], $registo['data_arq']);                                                           
        $this->conexao->desconectar();
        return $gs;
    }
    public function LocalizarRect($gs) {
        $sql = "SELECT * FROM tbl_guardseg WHERE id_estrada = '$gs' AND arq = 0";
         //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function Rectificar($gs) {
        $sql = "UPDATE tbl_guardseg SET alt = '" . $gs->getAlt() .
                "',reg = '" . $gs->getReg() .
                "',id_estrada = '" . $gs->getId_estrada() .
                "',data = '" . $gs->getData() .
                "',hora = '" . $gs->getHora() .
                "',pkinicio = '" . $gs->getPkinicio() .              
                "',altitd_pki = '" .$gs->getAltitd_pki() . 
                "',lat_ci = '" .$gs->getLat_ci() . 
                "',lat_ni = '" .$gs->getLat_ni() . 
                "',long_ci = '" .$gs->getLong_ci() . 
                "',long_ni = '" .$gs->getLong_ni() . 
                "',pkfim = '" .$gs->getPkfim() . 
                "',altitd_pkf = '" .$gs->getAltitd_pkf() .
                "',lat_cf = '" .$gs->getLat_cf() .              
                "',lat_nf = '" .$gs->getLat_nf() .
                "',long_cf = '" .$gs->getLong_cf() . 
                "',long_nf = '" .$gs->getLong_nf() .             
                "',guardseg = '" . $gs->getGuardseg() .
                "',sentido = '" . $gs->getSentido() .
                "',arq = '" . $gs->getArq() .
                "',data_arq = '" . $gs->GetData_arq(). "'WHERE id_guardseg =" . $gs->GetId_guardseg();
         //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
          if (!$sql){
                echo "<script type=\"text/javascript\"> alert('Ocorreu um erro!');</script>";
            }else{
             echo "<script type=\"text/javascript\"> alert('Os registos foram retificados!');</script>";
        }
    }
    
     //------------------------------------ EXCEL --------------------------------
    
   public function ExportExcelGuardseg(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_guardseg.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_guardseg.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_guardseg.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_guardseg.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_guardseg.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_guardseg.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_guardseg.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_guardseg.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_guardseg.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_guardseg.*
        FROM tbl_estrada INNER JOIN tbl_guardseg ON tbl_estrada.id_estrada = tbl_guardseg.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_guardseg.arq = 0";
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
