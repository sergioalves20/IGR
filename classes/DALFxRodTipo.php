<?php

require_once 'Conexao.php';
require_once 'FxrodTipo.php';

class DALFxRodTipo {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($fxrodtipo) {

        $sql = "INSERT INTO tbl_fxrodtipo (alt,reg, id_fxrod, id_estrada, data, hora, pkinicio,  altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf, terrabt, pedra, revsuperf, bb, bclas, via, ass)VALUES('";

        $sql = $sql . $fxrodtipo->getAlt() . "','";
        $sql = $sql . $fxrodtipo->getReg() . "','";
        $sql = $sql . $fxrodtipo->getId_fxrod() . "','";
        $sql = $sql . $fxrodtipo->getId_estrada() . "','";
        $sql = $sql . $fxrodtipo->getData() . "','";
        $sql = $sql . $fxrodtipo->getHora() . "','";
        $sql = $sql . $fxrodtipo->getPkinicio() . "','";
        $sql = $sql . $fxrodtipo->getAltitd_pki() . "','";
        $sql = $sql . $fxrodtipo->getLat_ci() . "','";
        $sql = $sql . $fxrodtipo->getLat_ni() . "','";
        $sql = $sql . $fxrodtipo->getLong_ci() . "','";
        $sql = $sql . $fxrodtipo->getLong_ni() . "','";
        $sql = $sql . $fxrodtipo->getPkfim() . "','";
        $sql = $sql . $fxrodtipo->getAltitd_pkf() . "','";
        $sql = $sql . $fxrodtipo->getLat_cf() . "','";
        $sql = $sql . $fxrodtipo->getLat_nf() . "','";
        $sql = $sql . $fxrodtipo->getLong_cf() . "','";
        $sql = $sql . $fxrodtipo->getLong_nf() . "','";
        $sql = $sql . $fxrodtipo->getTerrabt() . "','";
        $sql = $sql . $fxrodtipo->getPedra() . "','";
        $sql = $sql . $fxrodtipo->getRevsuperf() . "','";
        $sql = $sql . $fxrodtipo->getBb() . "','";
        $sql = $sql . $fxrodtipo->getBclas() . "','";
        $sql = $sql . $fxrodtipo->getVia() . "','";
        $sql = $sql . $fxrodtipo->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($fxrodtipo) {
        $sql = "UPDATE tbl_fxrodtipo SET alt = '" . $fxrodtipo->getAlt() .
                "',reg = '" . $fxrodtipo->getReg() .
                "',id_fxrod = '" . $fxrodtipo->getId_fxrod() .
                "',id_estrada = '" . $fxrodtipo->getId_estrada() .
                "',data = '" . $fxrodtipo->getData() .
                "',hora = '" . $fxrodtipo->getHora() .
                "',pkinicio = '" . $fxrodtipo->getPkinicio() .
                "',altitd_pki = '" . $fxrodtipo->getAltitd_pki() .
                "',lat_ci = '" . $fxrodtipo->getLat_ci() .
                "',lat_ni = '" . $fxrodtipo->getLat_ni() .
                "',long_ci = '" . $fxrodtipo->getLong_ci() .
                "',long_ni = '" . $fxrodtipo->getLong_ni() .
                "',pkfim = '" . $fxrodtipo->getPkfim() .
                "',altitd_pkf = '" . $fxrodtipo->getAltitd_pkf() .
                "',lat_cf = '" . $fxrodtipo->getLat_cf() .
                "',lat_nf = '" . $fxrodtipo->getLat_nf() .
                "',long_cf = '" . $fxrodtipo->getLong_cf() .
                "',long_nf = '" . $fxrodtipo->getLong_nf() .
                "',terrabt = '" . $fxrodtipo->getTerrabt() .
                "',pedra = '" . $fxrodtipo->getPedra() .
                "',revsuperf = '" . $fxrodtipo->getRevsuperf() .
                "',bb = '" . $fxrodtipo->getBb() .
                "',bclas = '" . $fxrodtipo->getBclas() .
                "',via = '" . $fxrodtipo->getVia() .
                "',ass = '" . $fxrodtipo->getAss() . "'WHERE id_fxrodtipo =" . $fxrodtipo->GetId_fxrodtipo();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Excluir($fxrodtipo) {
        $sql = "DELETE FROM tbl_fxrodtipo WHERE id_fxrodtipo =  $fxrodtipo";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Localizar() {
        //$sql = "SELECT * FROM tbl_fxrodtipo WHERE id_estrada = '$fxrodtipo'AND data = CURDATE() ORDER BY pkinicio ";
        $sql = "SELECT * FROM tbl_fxrodtipo WHERE  data = CURDATE() ORDER BY pkinicio ";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabFxrodtipo($fxrodtipo){
         $sql = "SELECT * FROM tbl_fxrodtipo WHERE id_estrada = '$fxrodtipo' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function CarregaFxrodtipo($cod) {
        $sql = "SELECT * FROM tbl_fxrodtipo WHERE id_fxrodtipo = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array(); 
        $fxrodtipo = new FxrodTipo($registo['id_fxrodtipo'],$registo['alt'],$registo['reg'],$registo['id_fxrod'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'], $registo['terrabt'], $registo['pedra'], $registo['revsuperf'], $registo['bb'], $registo['bclas'], $registo['via'], $registo['ass']);   
        $this->conexao->desconectar();
        return $fxrodtipo;
    }
     public function ListaEstradas() {
        $sql = " SELECT tbl_fxrodtipo.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_fxrodtipo.alt = 0 AND tbl_fxrodtipo.arq = 0
        GROUP BY tbl_fxrodtipo.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  
    //----------------------- RECTIFICAR -----------------------------
     public function CarregaFxrodtipoRect($cod) {
        $sql = "SELECT * FROM tbl_fxrodtipo WHERE id_fxrodtipo = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array(); 
        $fxrodtipo = new FxrodTipo($registo['id_fxrodtipo'],$registo['alt'],$registo['reg'],$registo['id_fxrod'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'], $registo['terrabt'], $registo['pedra'], $registo['revsuperf'], $registo['bb'], $registo['bclas'], $registo['via'], $registo['ass'],$registo['arq'],$registo['data_arq']);   
        $this->conexao->desconectar();
        return $fxrodtipo;
    }
    
     public function LocalizarRect($fxrodtipo) {
        $sql = "SELECT * FROM tbl_fxrodtipo WHERE id_estrada = '$fxrodtipo' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($fxrodtipo) {
        $sql = "UPDATE tbl_fxrodtipo SET alt = '" . $fxrodtipo->getAlt() .
                "',reg = '" . $fxrodtipo->getReg() .
                "',id_fxrod = '" . $fxrodtipo->getId_fxrod() .
                "',id_estrada = '" . $fxrodtipo->getId_estrada() .
                "',data = '" . $fxrodtipo->getData() .
                "',hora = '" . $fxrodtipo->getHora() .
                "',pkinicio = '" . $fxrodtipo->getPkinicio() .
                "',altitd_pki = '" . $fxrodtipo->getAltitd_pki() .
                "',lat_ci = '" . $fxrodtipo->getLat_ci() .
                "',lat_ni = '" . $fxrodtipo->getLat_ni() .
                "',long_ci = '" . $fxrodtipo->getLong_ci() .
                "',long_ni = '" . $fxrodtipo->getLong_ni() .
                "',pkfim = '" . $fxrodtipo->getPkfim() .
                "',altitd_pkf = '" . $fxrodtipo->getAltitd_pkf() .
                "',lat_cf = '" . $fxrodtipo->getLat_cf() .
                "',lat_nf = '" . $fxrodtipo->getLat_nf() .
                "',long_cf = '" . $fxrodtipo->getLong_cf() .
                "',long_nf = '" . $fxrodtipo->getLong_nf() .
                "',terrabt = '" . $fxrodtipo->getTerrabt() .
                "',pedra = '" . $fxrodtipo->getPedra() .
                "',revsuperf = '" . $fxrodtipo->getRevsuperf() .
                "',bb = '" . $fxrodtipo->getBb() .
                "',bclas = '" . $fxrodtipo->getBclas() .
                "',via = '" . $fxrodtipo->getVia() .
                "',arq = '" . $fxrodtipo->getArq() .
                "',data_arq = '" . $fxrodtipo->GetData_arq(). "'WHERE id_fxrodtipo =" . $fxrodtipo->GetId_fxrodtipo();
        echo $sql;
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
    
    public function ExportExcelFxrodtipo(){
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_fxrodtipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_fxrodtipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_fxrodtipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_fxrodtipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_fxrodtipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_fxrodtipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_fxrodtipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_fxrodtipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_fxrodtipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_fxrodtipo.*
        FROM tbl_estrada INNER JOIN tbl_fxrodtipo ON tbl_estrada.id_estrada = tbl_fxrodtipo.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_fxrodtipo.arq = 0";
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
