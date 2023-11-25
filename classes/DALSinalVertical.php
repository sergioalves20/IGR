<?php

require_once 'Conexao.php';

require_once 'SinalVertical.php';

class DALSinalVertical {

    private $conexao;

    public function __construct($conexao) {
        $this->setConexao($conexao);
    }

    public function Inserir($sinalvt) {

        $sql = "INSERT INTO tbl_sinalvt (alt,reg,id_estrada, data, hora, pkinicio, pkfim,lat_c,lat_n,
                                               long_c,long_n,altitude,sinalvt,sentido, ass)VALUES('";
        $sql = $sql . $sinalvt->getAlt() . "','";
        $sql = $sql . $sinalvt->getReg() . "','";
        $sql = $sql . $sinalvt->getId_estrada() . "','";
        $sql = $sql . $sinalvt->getData() . "','";
        $sql = $sql . $sinalvt->getHora() . "','";
        $sql = $sql . $sinalvt->getPkinicio() . "','";
        $sql = $sql . $sinalvt->getPkfim() . "','";
        $sql = $sql . $sinalvt->GetLat_c() . "','";
        $sql = $sql . $sinalvt->GetLat_n() . "','";
        $sql = $sql . $sinalvt->GetLong_c() . "','";
        $sql = $sql . $sinalvt->GetLong_n() . "','";
        $sql = $sql . $sinalvt->GetAltitude() . "','";
        $sql = $sql . $sinalvt->getSinalvt() . "','";
        $sql = $sql . $sinalvt->getSentido() . "','";
        $sql = $sql . $sinalvt->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($sinalvt) {

        $sql = "UPDATE tbl_sinalvt SET alt = '" . $sinalvt->getAlt() .
                "',reg = '" . $sinalvt->getReg() .
                "',id_estrada = '" . $sinalvt->getId_estrada() .
                "',data = '" . $sinalvt->getData() .
                "',hora = '" . $sinalvt->getHora() .
                "',pkinicio = '" . $sinalvt->getPkinicio() .
                "',pkfim = '" . $sinalvt->getPkfim() .
                "',lat_c = '" . $sinalvt->getLat_c() .
                "',lat_n = '" . $sinalvt->getLat_n() .
                "',long_c = '" . $sinalvt->getLong_c() .
                "',long_n = '" . $sinalvt->getLong_n() .
                "',altitude = '" . $sinalvt->getAltitude() .
                "',sinalvt = '" . $sinalvt->getSinalvt() . 
                "',sentido = '" . $sinalvt->getSentido() .
                "',ass = '" . $sinalvt->getAss() . "'WHERE id_sinalvt =" . $sinalvt->GetId_sinalvt();        
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($sinalvt) {
        $sql = "DELETE FROM tbl_sinalvt WHERE id_sinalvt = $sinalvt";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($sinalvt) {
        $sql = "SELECT * FROM tbl_sinalvt WHERE sentido ='$sinalvt'  AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabSinalVertical($sinalvt) {
        $sql = "SELECT * FROM tbl_sinalvt WHERE id_estrada = '$sinalvt' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function CarregaSinalvt($cod) {
        $sql = "SELECT * FROM tbl_sinalvt WHERE id_sinalvt = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $sinalvt = new Sinalvt ($registo['id_sinalvt'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['data'],$registo['hora'],$registo['pkinicio'],$registo['pkfim'],$registo['lat_c'],$registo['lat_n'],$registo['long_c'],$registo['long_n'],$registo['altitude'],$registo['sinalvt'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $sinalvt;
    }
    
    public function ListaEstradas() {
        $sql = "SELECT tbl_sinalvt.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_sinalvt INNER JOIN tbl_estrada ON tbl_sinalvt.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_sinalvt.alt = 0 AND tbl_sinalvt.arq = 0
        GROUP BY tbl_sinalvt.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //------------------------ RECTIFICAR -----------------------------
     public function CarregaSinalvtRect($cod) {
        $sql = "SELECT * FROM tbl_sinalvt WHERE id_sinalvt = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $sinalvt = new Sinalvt ($registo['id_sinalvt'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['data'],$registo['hora'],$registo['pkinicio'],$registo['pkfim'],$registo['lat_c'],$registo['lat_n'],$registo['long_c'],$registo['long_n'],$registo['altitude'],$registo['sinalvt'],$registo['sentido'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $sinalvt;
    }    
    public function LocalizarRect($sinalvt) {
        $sql = "SELECT * FROM tbl_sinalvt WHERE id_estrada ='$sinalvt'  AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($sinalvt) {
        $sql = "UPDATE tbl_sinalvt SET alt = '" . $sinalvt->getAlt() .
                "',reg = '" . $sinalvt->getReg() .
                "',id_estrada = '" . $sinalvt->getId_estrada() .
                "',data = '" . $sinalvt->getData() .
                "',hora = '" . $sinalvt->getHora() .
                "',pkinicio = '" . $sinalvt->getPkinicio() .
                "',pkfim = '" . $sinalvt->getPkfim() .
                "',lat_c = '" . $sinalvt->getLat_c() .
                "',lat_n = '" . $sinalvt->getLat_n() .
                "',long_c = '" . $sinalvt->getLong_c() .
                "',long_n = '" . $sinalvt->getLong_n() .
                "',altitude = '" . $sinalvt->getAltitude() .
                "',sinalvt = '" . $sinalvt->getSinalvt() . 
                "',sentido = '" . $sinalvt->getSentido() .
                "',arq = '" . $sinalvt->getArq() .
                "',data_arq = '" . $sinalvt->GetData_arq(). "'WHERE id_sinalvt =" . $sinalvt->GetId_sinalvt();        
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
    
     public function ExportExcelSinalvt(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_sinalvt.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antao' AND tbl_sinalvt.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_sinalvt.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_sinalvt.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_sinalvt.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_sinalvt.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_sinalvt.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_sinalvt.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_sinalvt.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sinalvt.*
        FROM tbl_estrada INNER JOIN tbl_sinalvt ON tbl_estrada.id_estrada = tbl_sinalvt.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_sinalvt.arq = 0";
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
