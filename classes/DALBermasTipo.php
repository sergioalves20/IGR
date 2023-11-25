<?php
 
require_once 'Conexao.php';
require_once 'BermasTipo.php';

class DALBermasTipo {
   private $conexao;
   
   public function __construct($conexao) {
       $this->conexao = $conexao;
   }  
     function Inserir($bermastipo) {  
        $sql = "INSERT INTO tbl_bermastipo (alt,reg,id_berma,id_estrada,data,hora,pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,sentido,pavim,pedra,revsuperf,bb,bclas,ass) VALUES ('";
        $sql = $sql . $bermastipo->getAlt() . "','";
        $sql = $sql . $bermastipo->getReg() . "','";
        $sql = $sql . $bermastipo->getId_berma() . "','";
        $sql = $sql . $bermastipo->getId_estrada() . "','"; 
        $sql = $sql . $bermastipo->getData() . "','";
        $sql = $sql . $bermastipo->getHora() . "','";
        $sql = $sql . $bermastipo->getPkinicio() . "','";
        $sql = $sql . $bermas->getAltitd_pki() . "','";
        $sql = $sql . $bermas->getLat_ci() . "','";
        $sql = $sql . $bermas->getLat_ni() . "','";
        $sql = $sql . $bermas->getLong_ci() . "','";
        $sql = $sql . $bermas->getLong_ni() . "','";
        $sql = $sql . $bermas->getPkfim() . "','";
        $sql = $sql . $bermas->getAltitd_pkf() . "','";
        $sql = $sql . $bermas->getLat_cf() . "','";
        $sql = $sql . $bermas->getLat_nf() . "','";
        $sql = $sql . $bermas->getLong_cf() . "','";
        $sql = $sql . $bermas->getLong_nf() . "','";    
        $sql = $sql . $bermastipo->getSentido() . "','";
        $sql = $sql . $bermastipo->getPavim() . "','";
        $sql = $sql . $bermastipo->getPedra() . "','";
        $sql = $sql . $bermastipo->getRevsuperf() . "','";
        $sql = $sql . $bermastipo->getBb() . "','";
        $sql = $sql . $bermastipo->getBclas() . "','";        
        $sql = $sql . $bermastipo->getAss() . "')";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermastipo) {     
        $sql = "UPDATE tbl_bermastipo SET alt = '" . $bermastipo->getAlt() .
                "',reg = '" . $bermastipo->getReg() .
                "',id_berma = '" . $bermastipo->getId_berma() .
                "',id_estrada = '" . $bermastipo->getId_estrada() .
                "',data = '" . $bermastipo->getData() .
                "',hora = '" . $bermastipo->getHora() .
                "',pkinicio = '" . $bermastipo->getPkinicio() .
                "',altitd_pki = '" . $bermas->getAltitd_pki() .
                "',lat_ci = '" . $bermas->getLat_ci() .
                "',lat_ni = '" . $bermas->getLat_ni() .
                "',long_ci = '" . $bermas->getLong_ci() .
                "',long_ni = '" . $bermas->getLong_ni() .
                "',pkfim = '" . $bermas->getPkfim() .
                "',altitd_pkf = '" . $bermas->getAltitd_pkf() .
                "',lat_cf = '" . $bermas->getLat_cf() .
                "',lat_nf = '" . $bermas->getLat_nf() .
                "',long_cf = '" . $bermas->getLong_cf() .
                "',long_nf = '" . $bermas->getLong_nf() .
                "',sentido = '" . $bermastipo->getSentido() .
                "',pavim = '" . $bermastipo->getPavim() .
                "',pedra = '" . $bermastipo->getPedra() .
                "',revsuperf = '" . $bermastipo->getRevsuperf() .
                "',bb = '" . $bermastipo->getBb() .
                "',bclas = '" . $bermastipo->getBclas() .
                "',ass = '" . $bermastipo->getAss() . "'WHERE id_bermatipo =" . $bermastipo->getId_bermatipo();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermastipo) {
        $sql = "DELETE FROM tbl_bermastipo WHERE id_bermatipo = $bermastipo";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($bermastipo) {
        $sql = "SELECT * FROM tbl_bermastipo WHERE sentido =  '$bermastipo'AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function TabBermasTipo($bermastipo){
         $sql = "SELECT * FROM tbl_bermastipo WHERE id_estrada = '$bermastipo' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function CarregaBermasTipo($cod) {
        $sql = "SELECT * FROM tbl_bermastipo WHERE id_bermatipo = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $bermatipo = new BermasTipo($registo['id_bermatipo'],$registo['id_berma'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['sentido'],$registo['pavim'], $registo['pedra'], $registo['revsuperf'], $registo['bb'], $registo['bclas'], $registo['ass']);   
        $this->conexao->desconectar();
        return $bermatipo;
    }
    public function ListaEstradas() {
        $sql = "SELECT tbl_bermastipo.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_bermastipo INNER JOIN tbl_estrada ON tbl_bermastipo.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_bermastipo.alt = 0 AND tbl_bermastipo.arq = 0
        GROUP BY tbl_bermastipo.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //---------------------------RECTIFICAR------------------------------
     public function CarregaBermasTipoRect($cod) {
        $sql = "SELECT * FROM tbl_bermastipo WHERE id_bermatipo = '$cod'";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $bermatipo = new BermasTipo($registo['id_bermatipo'],$registo['alt'],$registo['reg'], $registo['id_berma'],$registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['sentido'],$registo['pavim'], $registo['pedra'], $registo['revsuperf'], $registo['bb'], $registo['bclas'], $registo['ass'], $registo['arq'], $registo['data_arq']);   
        $this->conexao->desconectar();
        return $bermatipo;
    }
    public function LocalizarRect($bermastipo) {
        $sql = "SELECT * FROM tbl_bermastipo WHERE id_estrada =  '$bermastipo' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($bermastipo) {     
        $sql = "UPDATE tbl_bermastipo SET alt = '" . $bermastipo->getAlt() .
                "',reg = '" . $bermastipo->getReg() .
                 "',id_berma = '" . $bermastipo->getId_berma() .
                "',id_estrada = '" . $bermastipo->getId_estrada() .                          
                "',data = '" . $bermastipo->getData() .
                "',hora = '" . $bermastipo->getHora() .
                "',pkinicio = '" . $bermastipo->getPkinicio() .
                "',altitd_pki = '" . $bermastipo->getAltitd_pki() .
                "',lat_ci = '" . $bermastipo->getLat_ci() .
                "',lat_ni = '" . $bermastipo->getLat_ni() .
                "',long_ci = '" . $bermastipo->getLong_ci() .
                "',long_ni = '" . $bermastipo->getLong_ni() .
                "',pkfim = '" . $bermastipo->getPkfim() .
                "',altitd_pkf = '" . $bermastipo->getAltitd_pkf() .
                "',lat_cf = '" . $bermastipo->getLat_cf() .
                "',lat_nf = '" . $bermastipo->getLat_nf() .
                "',long_cf = '" . $bermastipo->getLong_cf() .
                "',long_nf = '" . $bermastipo->getLong_nf() .
                "',sentido = '" . $bermastipo->getSentido() .
                "',pavim = '" . $bermastipo->getPavim() .
                "',pedra = '" . $bermastipo->getPedra() .
                "',revsuperf = '" . $bermastipo->getRevsuperf() .
                "',bb = '" . $bermastipo->getBb() .
                "',bclas = '" . $bermastipo->getBclas() .
                "',arq = '" . $bermastipo->getArq() .
                "',data_arq = '" . $bermastipo->GetData_arq() . "'WHERE id_bermatipo =" . $bermastipo->getId_bermatipo();
        // echo $sql;
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
    
   public function ExportExcelBermastipo(){
        $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_bermastipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_bermastipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_bermastipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_bermastipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_bermastipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_bermastipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_bermastipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_bermastipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_bermastipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermastipo.*
        FROM tbl_estrada INNER JOIN tbl_bermastipo ON tbl_estrada.id_estrada = tbl_bermastipo.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_bermastipo.arq = 0";
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
