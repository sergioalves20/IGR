<?php

require_once 'Conexao.php';
require_once 'Delineadores.php';

class DALDelineadores {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($delind) {
        $sql = "INSERT INTO tbl_delineadores (alt,reg, id_estrada, data, hora, pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,delin, sentido, ass)VALUES('";
        $sql = $sql . $delind->getAlt() . "','";
        $sql = $sql . $delind->getReg() . "','";
        $sql = $sql . $delind->getId_estrada() . "','";
        $sql = $sql . $delind->getData() . "','";
        $sql = $sql . $delind->getHora() . "','";
        $sql = $sql . $delind->getPkinicio() . "','";
        $sql = $sql . $delind->getAltitd_pki() . "','";
        $sql = $sql . $delind->getLat_ci() . "','";
        $sql = $sql . $delind->getLat_ni() . "','";
        $sql = $sql . $delind->getLong_ci() . "','";
        $sql = $sql . $delind->getLong_ni() . "','";
        $sql = $sql . $delind->getPkfim() . "','";
        $sql = $sql . $delind->getAltitd_pkf() . "','";
        $sql = $sql . $delind->getLat_cf() . "','";
        $sql = $sql . $delind->getLat_nf() . "','";
        $sql = $sql . $delind->getLong_cf() . "','";
        $sql = $sql . $delind->getLong_nf() . "','";
        $sql = $sql . $delind->getDelin() . "','";
        $sql = $sql . $delind->getSentido() . "','";
        $sql = $sql . $delind->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($delind) {
        $sql = "UPDATE tbl_delineadores SET alt = '" . $delind->getAlt() .
                "',reg = '" . $delind->getReg() .
                "',id_estrada = '" . $delind->getId_estrada() .
                "',data = '" . $delind->getData() .
                "',hora = '" . $delind->getHora() .
                "',pkinicio = '" . $delind->getPkinicio() .
                "',altitd_pki = '" . $delind->getAltitd_pki() .
                "',lat_ci = '" . $delind->getLat_ci() .
                "',lat_ni = '" . $delind->getLat_ni() .
                "',long_ci = '" . $delind->getLong_ci() .
                "',long_ni = '" . $delind->getLong_ni() .
                "',pkfim = '" . $delind->getPkfim() .
                "',altitd_pkf = '" . $delind->getAltitd_pkf() .
                "',lat_cf = '" . $delind->getLat_cf() .
                "',lat_nf = '" . $delind->getLat_nf() .
                "',long_cf = '" . $delind->getLong_cf() .
                "',long_nf = '" . $delind->getLong_nf() .
                "',delin = '" . $delind->getDelin() .
                "',sentido = '" . $delind->getSentido() ."'WHERE id_delind =" . $delind->getId_delind();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($delind) {
        $sql = "DELETE FROM tbl_delineadores WHERE id_delind = $delind";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($delind) {
        $sql = "SELECT * FROM tbl_delineadores WHERE sentido =  '$delind' AND data = CURDATE() ORDER BY pkinicio";
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function TabDelineadores($delind){
        $sql = "SELECT * FROM tbl_delineadores WHERE id_estrada = '$delind' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  public function CarregaDelineadores($cod) {
        $sql = "SELECT * FROM tbl_delineadores WHERE id_delind = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $delind = new Delineadores($registo['id_delind'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['delin'],$registo['sentido']);
        $this->conexao->desconectar();
        return $delind;
    }
public function ListaEstradas() {
        $sql = "SELECT tbl_delineadores.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_delineadores INNER JOIN tbl_estrada ON tbl_delineadores.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_delineadores.alt = 0 AND tbl_delineadores.arq = 0
        GROUP BY tbl_delineadores.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    // -------------------- RECTIFICAR ---------------------------
    public function CarregaDelineadoresRect($cod) {
        $sql = "SELECT * FROM tbl_delineadores WHERE id_delind = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $delind = new Delineadores($registo['id_delind'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['delin'],$registo['sentido'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $delind;
    }
     public function LocalizarRect($delind) {
        $sql = "SELECT * FROM tbl_delineadores WHERE id_estrada =  '$delind' AND arq = 0";
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($delind) {
        $sql = "UPDATE tbl_delineadores SET alt = '" . $delind->getAlt() .
                "',reg = '" . $delind->getReg() .
                "',id_estrada = '" . $delind->getId_estrada() .
                "',data = '" . $delind->getData() .
                "',hora = '" . $delind->getHora() .
                "',pkinicio = '" . $delind->getPkinicio() .
                "',altitd_pki = '" . $delind->getAltitd_pki() .
                "',lat_ci = '" . $delind->getLat_ci() .
                "',lat_ni = '" . $delind->getLat_ni() .
                "',long_ci = '" . $delind->getLong_ci() .
                "',long_ni = '" . $delind->getLong_ni() .
                "',pkfim = '" . $delind->getPkfim() .
                "',altitd_pkf = '" . $delind->getAltitd_pkf() .
                "',lat_cf = '" . $delind->getLat_cf() .
                "',lat_nf = '" . $delind->getLat_nf() .
                "',long_cf = '" . $delind->getLong_cf() .
                "',long_nf = '" . $delind->getLong_nf() .
                "',delin = '" . $delind->getDelin() .
                "',sentido = '" . $delind->getSentido() .
                 "',arq = '" . $delind->getArq() .
                "',data_arq = '" . $delind->GetData_arq()."'WHERE id_delind =" . $delind->getId_delind();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
         if (!$sql){
                echo "<script type=\"text/javascript\"> alert('Ocorreu um erro!');</script>";
            }else{
             echo "<script type=\"text/javascript\"> alert('Os registos foram rectificados!');</script>";
        }
    }
 //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelDelineadores(){
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_delineadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_delineadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_delineadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_delineadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_delineadores.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_delineadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_delineadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_delineadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_delineadores.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_delineadores.*
        FROM tbl_estrada INNER JOIN tbl_delineadores ON tbl_estrada.id_estrada = tbl_delineadores.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_delineadores.arq = 0";
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
