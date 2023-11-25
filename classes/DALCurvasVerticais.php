<?php
require_once 'Conexao.php';
require_once 'CurvasVerticais.php';
class DALCurvasVerticais {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($curvav) {
        $sql = "INSERT INTO tbl_curvasverticais (alt,reg, id_estrada, data, hora, pkinicio, pkfim,lat_c, lat_n, long_c, long_n, altitude, sentido, raiovertical,ass)VALUES('";
        $sql = $sql . $curvav->getAlt() . "','";
        $sql = $sql . $curvav->getReg() . "','";
        $sql = $sql . $curvav->getId_estrada() . "','";
        $sql = $sql . $curvav->getData() . "','";
        $sql = $sql . $curvav->getHora() . "','";
        $sql = $sql . $curvav->getPkinicio() . "','";
        $sql = $sql . $curvav->getPkfim() . "','";
        $sql = $sql . $curvav->getLat_c() . "','";
        $sql = $sql . $curvav->getLat_n() . "','";
        $sql = $sql . $curvav->getLong_c() . "','";
        $sql = $sql . $curvav->getLong_n() . "','";
        $sql = $sql . $curvav->getAltitude() . "','";
        $sql = $sql . $curvav->getSentido() . "','";
        $sql = $sql . $curvav->getRaiovertical() . "','";
        $sql = $sql . $curvav->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($curvav) {

        $sql = "UPDATE tbl_curvasverticais SET alt = '" . $curvav->getAlt() .
                "',id_estrada = '" . $curvav->getId_estrada() .
                "',data = '" . $curvav->getData() .
                "',hora = '" . $curvav->getHora() .
                "',pkinicio = '" . $curvav->getPkinicio() .
                "',pkfim = '" . $curvav->getPkfim() .
                "',lat_c = '" . $curvav->getLat_c() .
                "',lat_n = '" . $curvav->getLat_n() .
                "',long_c = '" . $curvav->getLong_c() .
                "',long_n = '" . $curvav->getLong_n() .
                "',altitude = '" . $curvav->getAltitude() .
                "',sentido = '" . $curvav->getSentido() .
                "',raiovertical = '" . $curvav->getRaiovertical() .
                "',ass = '" . $curvav->getAss() . "'WHERE id_curvav =" . $curvav->GetId_curvav();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
        
    }

    public function Excluir($curvav) {
        $sql = "DELETE FROM tbl_curvasverticais WHERE id_curvav = $curvav";
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_curvasverticais WHERE data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabCurvav($curvav) {
        $sql = "SELECT * FROM tbl_curvasverticais WHERE id_curvav = '$curvav' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
        }
    public function CarregaCurvav($cod) {
        $sql = "SELECT * FROM tbl_curvasverticais WHERE id_curvav = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $curvav = new CurvasVerticais($registo['id_curvav'], $registo['alt'], $registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['sentido'], $registo['raiovertical']);
        $this->conexao->desconectar();
        return $curvav;
    }
     //----------------------------RECTIFICAR--------------------------------------------------
     public function CarregaCurvavRect($cod) {
        $sql = "SELECT * FROM tbl_curvasverticais WHERE id_curvav = '$cod'";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $curvav = new CurvasVerticais($registo['id_curvav'], $registo['alt'], $registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['sentido'], $registo['raiovertical'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $curvav;
    }
     public function LocalizarRect($curvav) {
        $sql = "SELECT * FROM tbl_curvasverticais WHERE id_estrada = '$curvav' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($curvav) {
        $sql = "UPDATE tbl_curvasverticais SET alt = '" . $curvav->getAlt() .
                "',id_estrada = '" . $curvav->getId_estrada() .
                "',data = '" . $curvav->getData() .
                "',hora = '" . $curvav->getHora() .
                "',pkinicio = '" . $curvav->getPkinicio() .
                "',pkfim = '" . $curvav->getPkfim() .
                "',lat_c = '" . $curvav->getLat_c() .
                "',lat_n = '" . $curvav->getLat_n() .
                "',long_c = '" . $curvav->getLong_c() .
                "',long_n = '" . $curvav->getLong_n() .
                "',altitude = '" . $curvav->getAltitude() .
                "',sentido = '" . $curvav->getSentido() .
                "',raiovertical = '" . $curvav->getRaiovertical() .
                "',arq = '" . $curvav->getArq() .
                "',data_arq = '" . $curvav->GetData_arq()."'WHERE id_curvav =" . $curvav->GetId_curvav();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();       
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_curvasverticais.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_curvasverticais INNER JOIN tbl_estrada ON tbl_curvasverticais.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_curvasverticais.alt = 0 AND tbl_curvasverticais.arq = 0
        GROUP BY tbl_curvasverticais.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelCVerticais(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_curvasverticais.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_curvasverticais.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_curvasverticais.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_curvasverticais.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_curvasverticais.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_curvasverticais.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_curvasverticais.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_curvasverticais.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_curvasverticais.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_curvasverticais.*
        FROM tbl_estrada INNER JOIN tbl_curvasverticais ON tbl_estrada.id_estrada = tbl_curvasverticais.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_curvasverticais.arq = 0";
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
