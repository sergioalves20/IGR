<?php

require_once 'Conexao.php';
require_once 'Marcadores.php';

class DALMarcadores {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($marc) {
        $sql = "INSERT INTO tbl_marcadores (alt,reg,id_estrada,data,hora,pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,marc,sentido,ass) VALUES ('";
        $sql = $sql . $marc->getAlt() . "','";
        $sql = $sql . $marc->getReg() . "','";
        $sql = $sql . $marc->getId_estrada() . "','";
        $sql = $sql . $marc->getData() . "','";
        $sql = $sql . $marc->getHora() . "','";
        $sql = $sql . $marc->getPkinicio() . "','";
        $sql = $sql . $marc->getAltitd_pki() . "','";
        $sql = $sql . $marc->getLat_ci() . "','";
        $sql = $sql . $marc->getLat_ni() . "','";
        $sql = $sql . $marc->getLong_ci() . "','";
        $sql = $sql . $marc->getLong_ni() . "','";
        $sql = $sql . $marc->getPkfim() . "','";
        $sql = $sql . $marc->getAltitd_pkf() . "','";
        $sql = $sql . $marc->getLat_cf() . "','";
        $sql = $sql . $marc->getLat_nf() . "','";
        $sql = $sql . $marc->getLong_cf() . "','";
        $sql = $sql . $marc->getLong_nf() . "','";
        $sql = $sql . $marc->getMarc() . "','";
        $sql = $sql . $marc->getSentido() . "','";
        $sql = $sql . $marc->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
         if (!$sql){
                echo "<script type=\"text/javascript\"> alert('Ocorreu um erro!');</script>";
            }else{
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }
    }

    public function Alterar($marc) {
        $sql = "UPDATE tbl_marcadores SET alt = '" . $marc->getAlt() .
                "',reg = '" . $marc->getReg() .
                "',id_estrada = '" . $marc->getId_estrada() .
                "',data = '" . $marc->getData() .
                "',hora = '" . $marc->getHora() .
                "',pkinicio = '" . $marc->getPkinicio() .
                "',altitd_pki = '" . $marc->getAltitd_pki() .
                "',lat_ci = '" . $marc->getLat_ci() .
                "',lat_ni = '" . $marc->getLat_ni() .
                "',long_ci = '" . $marc->getLong_ci() .
                "',long_ni = '" . $marc->getLong_ni() .
                "',pkfim = '" . $marc->getPkfim() .
                "',altitd_pkf = '" . $marc->getAltitd_pkf() .
                "',lat_cf = '" . $marc->getLat_cf() .
                "',lat_nf = '" . $marc->getLat_nf() .
                "',long_cf = '" . $marc->getLong_cf() .
                "',long_nf = '" . $marc->getLong_nf() .
                "',marc = '" . $marc->getMarc() .
                "',sentido = '" . $marc->getSentido() ."'WHERE id_marc =" . $marc->getId_marc();
              
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($marc) {
        $sql = "DELETE FROM tbl_marcadores WHERE id_marc = $marc";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($marc) {
        $sql = "SELECT * FROM tbl_marcadores WHERE sentido =  '$marc' AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabMarcadores($marc){
        $sql = "SELECT * FROM tbl_marcadores WHERE id_estrada = '$marc' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaMarcadores($cod) {
        $sql = "SELECT * FROM tbl_marcadores WHERE id_marc = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $marc = new Marcadores($registo['id_marc'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['marc'],$registo['sentido']);
        $this->conexao->desconectar();
        return $marc;
    }
    
  
    public function ListaEstradas() {
        $sql = "SELECT tbl_marcadores.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_marcadores INNER JOIN tbl_estrada ON tbl_marcadores.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_marcadores.alt = 0 AND tbl_marcadores.arq = 0
        GROUP BY tbl_marcadores.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaMarcadoresRect($cod) {
        $sql = "SELECT * FROM tbl_marcadores WHERE id_marc = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $marc = new Marcadores($registo['id_marc'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['marc'],$registo['sentido'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $marc;
    }
     public function LocalizarRect($marc) {
        $sql = "SELECT * FROM tbl_marcadores WHERE id_estrada =  '$marc' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function Rectificar($marc) {
        $sql = "UPDATE tbl_marcadores SET alt = '" . $marc->getAlt() .
                "',reg = '" . $marc->getReg() .
                "',id_estrada = '" . $marc->getId_estrada() .
                "',data = '" . $marc->getData() .
                "',hora = '" . $marc->getHora() .
                "',pkinicio = '" . $marc->getPkinicio() .
                "',altitd_pki = '" . $marc->getAltitd_pki() .
                "',lat_ci = '" . $marc->getLat_ci() .
                "',lat_ni = '" . $marc->getLat_ni() .
                "',long_ci = '" . $marc->getLong_ci() .
                "',long_ni = '" . $marc->getLong_ni() .
                "',pkfim = '" . $marc->getPkfim() .
                "',altitd_pkf = '" . $marc->getAltitd_pkf() .
                "',lat_cf = '" . $marc->getLat_cf() .
                "',lat_nf = '" . $marc->getLat_nf() .
                "',long_cf = '" . $marc->getLong_cf() .
                "',long_nf = '" . $marc->getLong_nf() .
                "',marc = '" . $marc->getMarc() .
                "',sentido = '" . $marc->getSentido() .
                "',arq = '" . $marc->getArq() .
                "',data_arq = '" . $marc->GetData_arq()."'WHERE id_marc =" . $marc->getId_marc();              
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
     //------------------------------------ EXCEL --------------------------------
    
     public function ExportExcelMarcadores(){
        $sql = "SELECT tbl_estrada.ilha, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_marcadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_marcadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_marcadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_marcadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_marcadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_marcadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_marcadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_marcadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_marcadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_marcadores.*
        FROM tbl_estrada INNER JOIN tbl_marcadores ON tbl_estrada.id_estrada = tbl_marcadores.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_marcadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //-----------------------------------------------

}
