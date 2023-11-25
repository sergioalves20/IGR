<?php

require_once 'Conexao.php';
require_once 'Drensupf.php';

class DALDrensupf {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($drensupf) {
        $sql = "INSERT INTO tbl_drensupf (alt,reg, id_estrada, data, hora, pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,tipo,material, sentido, ass)VALUES('";
        $sql = $sql . $drensupf->getAlt() . "','";
        $sql = $sql . $drensupf->getReg() . "','";
        $sql = $sql . $drensupf->getId_estrada() . "','";
        $sql = $sql . $drensupf->getData() . "','";
        $sql = $sql . $drensupf->getHora() . "','";
        $sql = $sql . $drensupf->getPkinicio() . "','";
        $sql = $sql . $drensupf->getAltitd_pki() . "','";
        $sql = $sql . $drensupf->getLat_ci() . "','";
        $sql = $sql . $drensupf->getLat_ni() . "','";
        $sql = $sql . $drensupf->getLong_ci() . "','";
        $sql = $sql . $drensupf->getLong_ni() . "','";
        $sql = $sql . $drensupf->getPkfim() . "','";
        $sql = $sql . $drensupf->getAltitd_pkf() . "','";
        $sql = $sql . $drensupf->getLat_cf() . "','";
        $sql = $sql . $drensupf->getLat_nf() . "','";
        $sql = $sql . $drensupf->getLong_cf() . "','";
        $sql = $sql . $drensupf->getLong_nf() . "','";
        $sql = $sql . $drensupf->getTipo() . "','";
        $sql = $sql . $drensupf->getMaterial() . "','";
        $sql = $sql . $drensupf->getSentido() . "','";
        $sql = $sql . $drensupf->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($drensupf) {

        $sql = "UPDATE tbl_drensupf SET alt = '" . $drensupf->getAlt() .
                "',reg = '" . $drensupf->getReg() .
                "',id_estrada = '" . $drensupf->getId_estrada() .
                "',data = '" . $drensupf->getData() .
                "',hora = '" . $drensupf->getHora() .
                "',pkinicio = '" . $drensupf->getPkinicio() .
                "',altitd_pki = '" . $drensupf->getAltitd_pki() .
                "',lat_ci = '" . $drensupf->getLat_ci() .
                "',lat_ni = '" . $drensupf->getLat_ni() .
                "',long_ci = '" . $drensupf->getLong_ci() .
                "',long_ni = '" . $drensupf->getLong_ni() .
                "',pkfim = '" . $drensupf->getPkfim() .
                "',altitd_pkf = '" . $drensupf->getAltitd_pkf() .
                "',lat_cf = '" . $drensupf->getLat_cf() .
                "',lat_nf = '" . $drensupf->getLat_nf() .
                "',long_cf = '" . $drensupf->getLong_cf() .
                "',long_nf = '" . $drensupf->getLong_nf() .
                "',tipo = '" . $drensupf->getTipo() .
                "',material = '" . $drensupf->getMaterial() . 
                "',sentido = '" . $drensupf->getSentido() . 
                "',ass = '" . $drensupf->getAss() . "'WHERE id_drensupf =" . $drensupf->GetId_drensupf();
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($drensupf) {
        $sql = "DELETE FROM tbl_drensupf WHERE id_drensupf = '$drensupf'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($drensupf) {
        $sql = "SELECT * FROM tbl_drensupf WHERE sentido = '$drensupf' AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function TabDrensupf($drensupf){
        $sql = "SELECT * FROM tbl_drensupf WHERE id_estrada = '$drensupf' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  public function CarregaDrensupf($cod) {
        $sql = "SELECT * FROM tbl_drensupf WHERE id_drensupf = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $drensupf = new Drensupf($registo['id_drensupf'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['tipo'],$registo['material'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $drensupf;
    }
    
     public function ListaEstradas() {
        $sql = "SELECT tbl_drensupf.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_drensupf INNER JOIN tbl_estrada ON tbl_drensupf.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_drensupf.alt = 0 AND tbl_drensupf.arq = 0
        GROUP BY tbl_drensupf.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     
     //----------------------------RECTIFICAR--------------------------------------------------
    
      public function CarregaDrensupfRect($cod) {
        $sql = "SELECT * FROM tbl_drensupf WHERE id_drensupf = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $drensupf = new Drensupf($registo['id_drensupf'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['tipo'],$registo['material'],$registo['sentido'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $drensupf;
    }
     public function LocalizarRect($drensupf) {
        $sql = "SELECT * FROM tbl_drensupf WHERE id_estrada = '$drensupf' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }  
       public function Rectificar($drensupf) {
        $sql = "UPDATE tbl_drensupf SET alt = '" . $drensupf->getAlt() .
                "',reg = '" . $drensupf->getReg() .
                "',id_estrada = '" . $drensupf->getId_estrada() .
                "',data = '" . $drensupf->getData() .
                "',hora = '" . $drensupf->getHora() .
                "',pkinicio = '" . $drensupf->getPkinicio() .
                "',altitd_pki = '" . $drensupf->getAltitd_pki() .
                "',lat_ci = '" . $drensupf->getLat_ci() .
                "',lat_ni = '" . $drensupf->getLat_ni() .
                "',long_ci = '" . $drensupf->getLong_ci() .
                "',long_ni = '" . $drensupf->getLong_ni() .
                "',pkfim = '" . $drensupf->getPkfim() .
                "',altitd_pkf = '" . $drensupf->getAltitd_pkf() .
                "',lat_cf = '" . $drensupf->getLat_cf() .
                "',lat_nf = '" . $drensupf->getLat_nf() .
                "',long_cf = '" . $drensupf->getLong_cf() .
                "',long_nf = '" . $drensupf->getLong_nf() .
                "',tipo = '" . $drensupf->getTipo() .
                "',material = '" . $drensupf->getMaterial() . 
                "',sentido = '" . $drensupf->getSentido() . 
                "',arq = '" . $drensupf->getArq() .
                "',data_arq = '" . $drensupf->GetData_arq(). "'WHERE id_drensupf =" . $drensupf->GetId_drensupf();
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    
     //------------------------------------ EXCEL --------------------------------
    
   public function ExportExcelDrensupf(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo,tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_drensupf.arq =0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_drensupf.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_drensupf.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_drensupf.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_drensupf.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_drensupf.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_drensupf.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_drensupf.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_drensupf.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_drensupf.*
        FROM tbl_estrada INNER JOIN tbl_drensupf ON tbl_estrada.id_estrada = tbl_drensupf.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_drensupf.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //-----------------------------------------------
    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        return $this->conexao;
    }

}
