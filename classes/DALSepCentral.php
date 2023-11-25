<?php

require_once 'Conexao.php';
require_once 'SepCentral.php';

class DALSepCentral {

    private $conexao;

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($sepcent) {

        $sql = "INSERT INTO tbl_sepcentral (alt,reg, id_estrada, data, hora, pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,nat,ass)VALUES('";
        $sql = $sql . $sepcent->getAlt() . "','";
        $sql = $sql . $sepcent->getReg() . "','";
        $sql = $sql . $sepcent->getId_estrada() . "','";
        $sql = $sql . $sepcent->getData() . "','";
        $sql = $sql . $sepcent->getHora() . "','";
        $sql = $sql . $sepcent->getPkinicio() . "','";
        $sql = $sql . $sepcent->getAltitd_pki() . "','";
        $sql = $sql . $sepcent->getLat_ci() . "','";
        $sql = $sql . $sepcent->getLat_ni() . "','";
        $sql = $sql . $sepcent->getLong_ci() . "','";
        $sql = $sql . $sepcent->getLong_ni() . "','";
        $sql = $sql . $sepcent->getPkfim() . "','";
        $sql = $sql . $sepcent->getAltitd_pkf() . "','";
        $sql = $sql . $sepcent->getLat_cf() . "','";
        $sql = $sql . $sepcent->getLat_nf() . "','";
        $sql = $sql . $sepcent->getLong_cf() . "','";
        $sql = $sql . $sepcent->getLong_nf() . "','";
        $sql = $sql . $sepcent->getNat() . "','";
        $sql = $sql . $sepcent->getAss() . "')";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($sepcent) {

        $sql = "UPDATE tbl_sepcentral SET alt = '" . $sepcent->getAlt() .
                "',reg = '" . $sepcent->getReg() .
                "',id_estrada = '" . $sepcent->getId_estrada() .
                "',data = '" . $sepcent->getData() .
                "',hora = '" . $sepcent->getHora() .
                "',pkinicio = '" . $sepcent->getPkinicio() .
                "',altitd_pki = '" . $sepcent->getAltitd_pki() .
                "',lat_ci = '" . $sepcent->getLat_ci() .
                "',lat_ni = '" . $sepcent->getLat_ni() .
                "',long_ci = '" . $sepcent->getLong_ci() .
                "',long_ni = '" . $sepcent->getLong_ni() .
                "',pkfim = '" . $sepcent->getPkfim() .
                "',altitd_pkf = '" . $sepcent->getAltitd_pkf() .
                "',lat_cf = '" . $sepcent->getLat_cf() .
                "',lat_nf = '" . $sepcent->getLat_nf() .
                "',long_cf = '" . $sepcent->getLong_cf() .
                "',long_nf = '" . $sepcent->getLong_nf() .
                "',nat = '" . $sepcent->getNat() .
                "',ass = '" . $sepcent->getAss() . "'WHERE id_sepcent =" . $sepcent->GetId_sepcent();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($sepcent) {
        $sql = "DELETE FROM tbl_sepcentral WHERE id_sepcent = $sepcent";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($sepcent) {
        $sql = "SELECT * FROM tbl_sepcentral WHERE nat = '$sepcent' AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabSepcentral($sepcent){
        $sql = "SELECT * FROM tbl_sepcentral WHERE id_estrada = '$sepcent' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  public function CarregaSepcent($cod) {
        $sql = "SELECT * FROM tbl_sepcentral WHERE id_sepcent = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $sepcent = new SepCentral($registo['id_sepcent'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['nat'],$registo['ass']);
        $this->conexao->desconectar();
        return $sepcent;
    }
    
    public function ListaEstradas() {
        $sql = "SELECT tbl_sepcentral.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_sepcentral INNER JOIN tbl_estrada ON tbl_sepcentral.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_sepcentral.alt = 0 AND tbl_sepcentral.arq = 0
        GROUP BY tbl_sepcentral.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //----------------------------RECTIFICAR--------------------------------------------------
    
     public function CarregaSepcentRect($cod) {
        $sql = "SELECT * FROM tbl_sepcentral WHERE id_sepcent = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $sepcent = new SepCentral($registo['id_sepcent'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['nat'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $sepcent;
    }
    public function LocalizarRect($sepcent) {
        $sql = "SELECT * FROM tbl_sepcentral WHERE id_estrada = '$sepcent' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }   
  public function Rectificar($sepcent) {
        $sql = "UPDATE tbl_sepcentral SET alt = '" . $sepcent->getAlt() .
                "',reg = '" . $sepcent->getReg() .
                "',id_estrada = '" . $sepcent->getId_estrada() .
                "',data = '" . $sepcent->getData() .
                "',hora = '" . $sepcent->getHora() .
                "',pkinicio = '" . $sepcent->getPkinicio() .
                "',altitd_pki = '" . $sepcent->getAltitd_pki() .
                "',lat_ci = '" . $sepcent->getLat_ci() .
                "',lat_ni = '" . $sepcent->getLat_ni() .
                "',long_ci = '" . $sepcent->getLong_ci() .
                "',long_ni = '" . $sepcent->getLong_ni() .
                "',pkfim = '" . $sepcent->getPkfim() .
                "',altitd_pkf = '" . $sepcent->getAltitd_pkf() .
                "',lat_cf = '" . $sepcent->getLat_cf() .
                "',lat_nf = '" . $sepcent->getLat_nf() .
                "',long_cf = '" . $sepcent->getLong_cf() .
                "',long_nf = '" . $sepcent->getLong_nf() .
                "',nat = '" . $sepcent->getNat() .
                "',arq = '" . $sepcent->getArq() .
                "',data_arq = '" . $sepcent->GetData_arq(). "'WHERE id_sepcent =" . $sepcent->GetId_sepcent();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     //------------------------------------ EXCEL --------------------------------
    
   public function ExportExcelSepCentral(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_sepcentral.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_sepcentral.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_sepcentral.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_sepcentral.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_sepcentral.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
           $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_sepcentral.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_sepcentral.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_sepcentral.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_sepcentral.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sepcentral.*
        FROM tbl_estrada INNER JOIN tbl_sepcentral ON tbl_estrada.id_estrada = tbl_sepcentral.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_sepcentral.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //-----------------------------------------------
}
