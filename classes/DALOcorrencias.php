<?php
require_once 'Conexao.php';
require_once 'Ocorrencias.php';

class DALOcorrencias {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($ocorrencias) {
        $sql = "INSERT INTO tbl_ocorrencias (alt,reg,data,hora,id_estrada,pkinicio,altitd_pki,lat_ci,lat_ni, long_ci,long_ni,pkfim,altitd_pkf,lat_cf,lat_nf, long_cf,long_nf,sentido,ocor,foto1,foto2,ass)VALUES('";                                            
        $sql = $sql . $ocorrencias->GetAlt() . "','";
        $sql = $sql . $ocorrencias->GetReg() . "','";
        $sql = $sql . $ocorrencias->GetData() . "','";
        $sql = $sql . $ocorrencias->GetHora() . "','";
        $sql = $sql . $ocorrencias->GetId_estrada() . "','";
        $sql = $sql . $ocorrencias->GetPkinicio() . "','";
        $sql = $sql . $ocorrencias->GetAltitd_pki() . "','";
        $sql = $sql . $ocorrencias->GetLat_ci() . "','";
        $sql = $sql . $ocorrencias->GetLat_ni() . "','";
        $sql = $sql . $ocorrencias->GetLong_ci() . "','";
        $sql = $sql . $ocorrencias->GetLong_ni() . "','";
        $sql = $sql . $ocorrencias->GetPkfim() . "','";
        $sql = $sql . $ocorrencias->GetAltitd_pkf() . "','";
        $sql = $sql . $ocorrencias->GetLat_cf() . "','";
        $sql = $sql . $ocorrencias->GetLat_nf() . "','";
        $sql = $sql . $ocorrencias->GetLong_cf() . "','";
        $sql = $sql . $ocorrencias->GetLong_nf() . "','";
        $sql = $sql . $ocorrencias->GetSentido() . "','";
        $sql = $sql . $ocorrencias->GetOcor() . "','";
        $sql = $sql . $ocorrencias->GetFoto1() . "','";
        $sql = $sql . $ocorrencias->GetFoto2() . "','";
        $sql = $sql . $ocorrencias->GetAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($ocorrencias) {
        $sql = "UPDATE tbl_ocorrencias SET alt = '" . $ocorrencias->getAlt() .
                "',reg = '" . $ocorrencias->getReg() .
                "',data = '" . $ocorrencias->getData() .
                "',hora = '" . $ocorrencias->getHora() .
                "',id_estrada = '" . $ocorrencias->getId_estrada() .
                "',pkinicio = '" . $ocorrencias->getPkinicio() .
                "',altitd_pki = '" . $ocorrencias->getAltitd_pki() .
                "',lat_ci = '" . $ocorrencias->getLat_ci() .
                "',lat_ni = '" . $ocorrencias->getLat_ni() .
                "',long_ci = '" . $ocorrencias->getLong_ci() .
                "',long_ni = '" . $ocorrencias->getLong_ni() .
                "',pkfim = '" . $ocorrencias->getPkfim() .
                "',altitd_pki = '" . $ocorrencias->getAltitd_pkf() .
                "',lat_cf = '" . $ocorrencias->getLat_cf() .
                "',lat_nf = '" . $ocorrencias->getLat_nf() .
                "',long_cf = '" . $ocorrencias->getLong_cf() .
                "',long_nf = '" . $ocorrencias->getLong_nf() .
                "',sentido = '" . $ocorrencias->getSentido() .
                "',ocor = '" . $ocorrencias->getOcor() .
                "',foto1 = '" . $ocorrencias->getFoto1() .
                "',foto2 = '" . $ocorrencias->getFoto2() .
                "',ass = '" . $ocorrencias->GetAss() . "'WHERE id_ocor =" . $ocorrencias->GetId_ocor();
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($ocorrencias) {
        $sql = "DELETE FROM tbl_ocorrencias WHERE id_ocor = $ocorrencias";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

     public function Localizar() {
        $sql = "SELECT * FROM tbl_ocorrencias WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_ocorrencias WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabOcorrencias($ocorrencias) {
        //$sql = "SELECT * FROM tbl_ocorrencias WHERE id_estrada = '$ocorrencias' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //$sql = "SELECT tbl_ocorrencias.*, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        $sql="SELECT tbl_ocorrencias.*, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_ocorrencias.id_estrada = '$ocorrencias' AND tbl_ocorrencias.alt = 0 AND tbl_ocorrencias.arq = 0       
        GROUP BY tbl_ocorrencias.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaOcorrencias($cod) {
        $sql = "SELECT * FROM tbl_ocorrencias WHERE id_ocor = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ocorrencias = new Ocorrencias($registo['id_ocor'],$registo['alt'],$registo['reg'],$registo['data'], $registo['hora'],$registo['id_estrada'], $registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['sentido'],$registo['ocor'],$registo['ass']);
        $this->conexao->desconectar();
        return $ocorrencias;
    }
    
       public function ListaEstradas() {
        $sql = "SELECT tbl_ocorrencias.*, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_ocorrencias.alt = 0 AND tbl_ocorrencias.arq = 0       
        GROUP BY tbl_ocorrencias.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    public function CarregaOcorrenciasRect($cod) {
        $sql = "SELECT * FROM tbl_ocorrencias WHERE id_ocor = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ocorrencias = new Ocorrencias($registo['id_ocor'],$registo['alt'],$registo['reg'],$registo['data'], $registo['hora'],$registo['id_estrada'], $registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['sentido'],$registo['ocor'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $ocorrencias;
    }
     public function LocalizarRect($ocorr) {
        $sql = "SELECT * FROM tbl_ocorrencias WHERE id_estrada = '$ocorr' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function Rectificar($ocor) {
        $sql = "UPDATE tbl_ocorrencias SET alt = '" . $ocor->getAlt() .
                "',reg = '" . $ocor->getReg() .
                "',data = '" . $ocor->getData() .
                "',hora = '" . $ocor->getHora() .
                "',id_estrada = '" . $ocor->getId_estrada() .
                "',pkinicio = '" . $ocor->getPkinicio() .
                "',altitd_pki = '" . $ocor->getAltitd_pki() .
                "',lat_ci = '" . $ocor->getLat_ci() .
                "',lat_ni = '" . $ocor->getLat_ni() .
                "',long_ci = '" . $ocor->getLong_ci() .
                "',long_ni = '" . $ocor->getLong_ni() .
                "',pkfim = '" . $ocor->getPkfim() .
                "',altitd_pki = '" . $ocor->getAltitd_pkf() .
                "',lat_cf = '" . $ocor->getLat_cf() .
                "',lat_nf = '" . $ocor->getLat_nf() .
                "',long_cf = '" . $ocor->getLong_cf() .
                "',long_nf = '" . $ocor->getLong_nf() .
                "',sentido = '" . $ocor->getSentido() .
                "',ocor = '" . $ocor->getOcor() .
                "',foto1 = '" . $ocor->getFoto1() .
                "',foto2 = '" . $ocor->getFoto2() .
                "',arq = '" . $ocor->getArq() .
                "',data_arq = '" . $ocor->GetData_arq(). "'WHERE id_ocor =" . $ocor->GetId_ocor();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelOcorrencias(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_ocorrencias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_ocorrencias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_ocorrencias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_ocorrencias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_ocorrencias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_ocorrencias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_ocorrencias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_ocorrencias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_ocorrencias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ocorrencias.*
        FROM tbl_estrada INNER JOIN tbl_ocorrencias ON tbl_estrada.id_estrada = tbl_ocorrencias.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_ocorrencias.arq = 0";
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
