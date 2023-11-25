<?php

require_once 'Conexao.php';
require_once 'CurvasPlanta.php';

class DALCurvasPlanta {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($curvap) {

        $sql = "INSERT INTO tbl_curvasplanta (alt,reg, id_estrada, data, hora, pkinicio, pkfim,lat_c, lat_n, long_c, long_n, altitude, sentido, raioplanta,ass)VALUES('";
        $sql = $sql . $curvap->getAlt() . "','";
        $sql = $sql . $curvap->getReg() . "','";
        $sql = $sql . $curvap->getId_estrada() . "','";
        $sql = $sql . $curvap->getData() . "','";
        $sql = $sql . $curvap->getHora() . "','";
        $sql = $sql . $curvap->getPkinicio() . "','";
        $sql = $sql . $curvap->getPkfim() . "','";
        $sql = $sql . $curvap->getLat_c() . "','";
        $sql = $sql . $curvap->getLat_n() . "','";
        $sql = $sql . $curvap->getLong_c() . "','";
        $sql = $sql . $curvap->getLong_n() . "','";
        $sql = $sql . $curvap->getAltitude() . "','";
        $sql = $sql . $curvap->getSentido() . "','";
        $sql = $sql . $curvap->getRaioplanta() . "','";
        $sql = $sql . $curvap->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($curvap) {

        $sql = "UPDATE tbl_curvasplanta SET alt = '" . $curvap->getAlt() .
                "',reg = '" . $curvap->getReg() .
                "',id_estrada = '" . $curvap->getId_estrada() .
                "',data = '" . $curvap->getData() .
                "',hora = '" . $curvap->getHora() .
                "',pkinicio = '" . $curvap->getPkinicio() .
                "',pkfim = '" . $curvap->getPkfim() .
                "',lat_c = '" . $curvap->getLat_c() .
                "',lat_n = '" . $curvap->getLat_n() .
                "',long_c = '" . $curvap->getLong_c() .
                "',long_n = '" . $curvap->getLong_n() .
                "',altitude = '" . $curvap->getAltitude() .
                "',sentido = '" . $curvap->getSentido() .
                "',raioplanta = '" . $curvap->getRaioplanta() .
                "',ass = '" . $curvap->getAss() . "'WHERE id_curvap =" . $curvap->GetId_curvap();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($curvap) {
        $sql = "DELETE FROM tbl_curvasplanta WHERE id_curvap = $curvap";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_curvasplanta WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function TabCurvap($curvap) {
        $sql = "SELECT * FROM tbl_curvasplanta WHERE id_curvap = '$curvap' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function CarregaCurvap($cod) {
        $sql = "SELECT * FROM tbl_curvasplanta WHERE id_curvap = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $curvap = new CurvasPlanta($registo['id_curvap'], $registo['alt'], $registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['sentido'], $registo['raioplanta'], $registo['ass']);
        $this->conexao->desconectar();
        return $curvap;
    }
    //----------------------------RECTIFICAR--------------------------------------------------
    public function CarregaCurvapRect($cod) {
        $sql = "SELECT * FROM tbl_curvasplanta WHERE id_curvap = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $curvap = new CurvasPlanta($registo['id_curvap'], $registo['alt'], $registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['sentido'], $registo['raioplanta'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $curvap;
    }
     public function LocalizarRect($curvap) {
        $sql = "SELECT * FROM tbl_curvasplanta WHERE id_estrada = '$curvap' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }  
       public function Rectificar($curvap) {
        $sql = "UPDATE tbl_curvasplanta SET alt = '" . $curvap->getAlt() .
                "',reg = '" . $curvap->getReg() .
                "',id_estrada = '" . $curvap->getId_estrada() .
                "',data = '" . $curvap->getData() .
                "',hora = '" . $curvap->getHora() .
                "',pkinicio = '" . $curvap->getPkinicio() .
                "',pkfim = '" . $curvap->getPkfim() .
                "',lat_c = '" . $curvap->getLat_c() .
                "',lat_n = '" . $curvap->getLat_n() .
                "',long_c = '" . $curvap->getLong_c() .
                "',long_n = '" . $curvap->getLong_n() .
                "',altitude = '" . $curvap->getAltitude() .
                "',sentido = '" . $curvap->getSentido() .
                "',raioplanta = '" . $curvap->getRaioplanta() .
                "',arq = '" . $curvap->getArq() .
                "',data_arq = '" . $curvap->GetData_arq(). "'WHERE id_curvap =" . $curvap->GetId_curvap();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_curvasplanta.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_curvasplanta INNER JOIN tbl_estrada ON tbl_curvasplanta.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_curvasplanta.alt = 0 AND tbl_curvasplanta.arq = 0
        GROUP BY tbl_curvasplanta.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelCPlanta(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_curvasplanta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_curvasplanta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_curvasplanta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_curvasplanta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_curvasplanta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_curvasplanta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_curvasplanta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_curvasplanta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_curvasplanta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasplanta.*
        FROM tbl_estrada INNER JOIN tbl_curvasplanta ON tbl_estrada.id_estrada = tbl_curvasplanta.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_curvasplanta.arq = 0";
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
