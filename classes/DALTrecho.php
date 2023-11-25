<?php

require_once 'Conexao.php';
require_once 'Trecho.php';

class DALTrecho  {

    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($trecho) {

        $sql = "INSERT INTO tbl_trecho (alt, reg, id_estrada, data, hora, pkinicio,altitd_pki, sitioi,  lat_ci, lat_ni, long_ci, long_ni, pkfim,altitd_pkf,sitiof, lat_cf, lat_nf, long_cf, long_nf, ass)VALUES('";
        $sql = $sql . $trecho->GetAlt() . "','";
        $sql = $sql . $trecho->GetReg() . "','";
        $sql = $sql . $trecho->GetId_estrada() . "','";
        $sql = $sql . $trecho->GetData() . "','";
        $sql = $sql . $trecho->GetHora() . "','"; 
        $sql = $sql . $trecho->GetPkinicio() . "','";
        $sql = $sql . $trecho->GetAltitd_pki(). "','";
        $sql = $sql . $trecho->getSitioi() . "','";
        $sql = $sql . $trecho->getLat_ci() . "','";
        $sql = $sql . $trecho->getLat_ni() . "','";
        $sql = $sql . $trecho->getLong_ci() . "','";
        $sql = $sql . $trecho->getLong_ni() . "','";
        $sql = $sql . $trecho->getPkfim() . "','";
        $sql = $sql . $trecho->GetAltitd_pkf(). "','"; 
        $sql = $sql . $trecho->getSitiof() . "','";
        $sql = $sql . $trecho->getLat_cf() . "','";
        $sql = $sql . $trecho->getLat_nf() . "','";
        $sql = $sql . $trecho->getLong_cf() . "','";
        $sql = $sql . $trecho->getLong_nf() . "','";
        $sql = $sql . $trecho->GetAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($trecho) {

        $sql = "UPDATE tbl_trecho SET alt = '" . $trecho->getAlt() .
                "',reg = '" . $trecho->getReg() .
                "',id_estrada = '" . $trecho->getId_estrada() .
                "',data = '" . $trecho->getData() .
                "',hora = '" . $trecho->getHora() .
                "',pkinicio = '" . $trecho->getPkinicio() .
                "',altitd_pki = '" . $trecho->getAltitd_pki() .
                "',sitioi = '" . $trecho->getSitioi() .
                "',lat_ci = '" . $trecho->getLat_ci() .
                "',lat_ni = '" . $trecho->getLat_ni() .
                "',long_ci = '" . $trecho->getLong_ci() .
                "',long_ni = '" . $trecho->getLong_ni() .
                "',pkfim = '" . $trecho->getPkfim() .
                "',altitd_pki = '" . $trecho->getAltitd_pkf() .
                "',sitiof = '" . $trecho->getSitiof() .
                "',lat_cf = '" . $trecho->getLat_cf() .
                "',lat_nf = '" . $trecho->getLat_nf() .
                "',long_cf = '" . $trecho->getLong_cf() .
                "',long_nf = '" . $trecho->getLong_nf() .
                "',ass = '" . $trecho->GetAss() . "'WHERE id_trecho =" . $trecho->GetId_trecho();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($trecho) {
        $sql = "DELETE FROM tbl_trecho WHERE id_trecho = $trecho";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_trecho WHERE data = CURDATE() ORDER BY pkinicio";

       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
   public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_trecho WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabTrecho($trecho) {
        $sql = "SELECT * FROM tbl_trecho WHERE id_estrada = '$trecho' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaTrecho($cod) {
        $sql = "SELECT * FROM tbl_trecho WHERE id_trecho = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $trecho = new Trecho($registo['id_trecho'],$registo['alt'],$registo['reg'],$registo['data'], $registo['hora'],$registo['id_estrada'], $registo['pkinicio'],$registo['altitd_pki'],$registo['sitioi'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['sitiof'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['ass']);
        $this->conexao->desconectar();
        return $trecho;
    }
    //----------------------------------RECTIFICAR--------------------------------------------
     public function CarregaTrechoRect($cod) {
        $sql = "SELECT * FROM tbl_trecho WHERE id_trecho = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $trecho = new Trecho($registo['id_trecho'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['data'], $registo['hora'], $registo['pkinicio'],$registo['altitd_pki'],$registo['sitioi'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['sitiof'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $trecho;
    }
      public function LocalizarRect($trecho) {
        $sql = "SELECT * FROM tbl_trecho WHERE id_estrada = '$trecho' AND arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($trecho) {
        $sql = "UPDATE tbl_trecho SET alt = '" . $trecho->getAlt() .
                "',reg = '" . $trecho->getReg() .
                "',id_estrada = '" . $trecho->getId_estrada() .
                "',data = '" . $trecho->getData() .
                "',hora = '" . $trecho->getHora() .
                "',pkinicio = '" . $trecho->getPkinicio() .
                "',altitd_pki = '" . $trecho->getAltitd_pki() .
                "',sitioi = '" . $trecho->getSitioi() .
                "',lat_ci = '" . $trecho->getLat_ci() .
                "',lat_ni = '" . $trecho->getLat_ni() .
                "',long_ci = '" . $trecho->getLong_ci() .
                "',long_ni = '" . $trecho->getLong_ni() .
                "',pkfim = '" . $trecho->getPkfim() .
                "',altitd_pki = '" . $trecho->getAltitd_pkf() .
                "',sitiof = '" . $trecho->getSitiof() .
                "',lat_cf = '" . $trecho->getLat_cf() .
                "',lat_nf = '" . $trecho->getLat_nf() .
                "',long_cf = '" . $trecho->getLong_cf() .
                "',long_nf = '" . $trecho->getLong_nf() .
                "',arq = '" . $trecho->getArq() .
                "',data_arq = '" . $trecho->GetData_arq(). $trecho->GetAss() . "'WHERE id_trecho =" . $trecho->GetId_trecho();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    
     public function ListaEstradas() {
        $sql = "SELECT tbl_trecho.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_trecho INNER JOIN tbl_estrada ON tbl_trecho.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_trecho.alt = 0 AND tbl_trecho.arq = 0
        GROUP BY tbl_trecho.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelTrecho(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_trecho.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_trecho.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_trecho.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_trecho.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_trecho.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_trecho.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_trecho.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_trecho.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_trecho.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_trecho.*
        FROM tbl_estrada INNER JOIN tbl_trecho ON tbl_estrada.id_estrada = tbl_trecho.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_trecho.arq = 0";
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
