<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php"';
require_once 'Intersecao.php';

class DALIntersecao {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    function Inserir($intrs) {
        $sql = "INSERT INTO tbl_intersecao (alt,reg,id_estrada,data,hora,pkinicio,pkfim,lat_c,lat_n,long_c,long_n,altitude,desniv,denivel,sentido,ass) VALUES ('";
        $sql = $sql . $intrs->GetAlt() . "','";
        $sql = $sql . $intrs->GetReg() . "','";
        $sql = $sql . $intrs->GetId_estrada() . "','";
        $sql = $sql . $intrs->GetData() . "','";
        $sql = $sql . $intrs->GetHora() . "','";
        $sql = $sql . $intrs->GetPkinicio() . "','";
        $sql = $sql . $intrs->GetPkfim() . "','";
        $sql = $sql . $intrs->GetLat_c() . "','";
        $sql = $sql . $intrs->GetLat_n() . "','";
        $sql = $sql . $intrs->GetLong_c() . "','";
        $sql = $sql . $intrs->GetLong_n() . "','";
        $sql = $sql . $intrs->GetAltitude() . "','";
        $sql = $sql . $intrs->GetDesniv() . "','";
        $sql = $sql . $intrs->GetDenivel() . "','";
        $sql = $sql . $intrs->GetSentido() . "','";
        $sql = $sql . $intrs->GetAss() . "')";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($intrs) {
        $sql = "UPDATE tbl_intersecao SET alt = '" . $intrs->getAlt() .
                "',reg = '" . $intrs->getReg() .
                "',id_estrada = '" . $intrs->getId_estrada() .
                "',data = '" . $intrs->getData() .
                "',hora = '" . $intrs->getHora() .
                "',pkinicio = '" . $intrs->getPkinicio() .
                "',pkfim = '" . $intrs->getPkfim() .
                "',lat_c = '" . $intrs->getLat_c() .
                "',lat_n = '" . $intrs->getLat_n() .
                "',long_c = '" . $intrs->getLong_c() .
                "',long_n = '" . $intrs->getLong_n() .
                "',altitude = '" . $intrs->getAltitude() .
                "',desniv = '" . $intrs->getDesniv() .
                "',denivel = '" . $intrs->getDenivel() .
                "',sentido = '" . $intrs->getSentido() .
                "',ass = '" . $intrs->getAss() . "'WHERE id_intrs =" . $intrs->GetId_intrs();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($intrs) {
        $sql = "DELETE FROM tbl_intersecao WHERE id_intrs = $intrs";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($intrs) {
        //$sql = "SELECT * FROM tbl_intersecao WHERE denivel like '%" . $intrs .  "%' AND data = CURDATE() ORDER BY pkinicio";
        
        $sql = "SELECT tbl_intersecao.id_intrs,tbl_intersecao.alt,tbl_intersecao.reg, tbl_intersecao.hora,tbl_intersecao.data, tbl_intersecao.id_estrada, tbl_estrada.codigo, tbl_intersecao.pkinicio, tbl_intersecao.pkfim, tbl_intersecao.lat_c, tbl_intersecao.lat_n, tbl_intersecao.long_c, tbl_intersecao.long_n, tbl_intersecao.altitude, tbl_intersecao.desniv, tbl_intersecao.denivel, tbl_intersecao.sentido,tbl_intersecao.ass
        FROM tbl_intersecao INNER JOIN tbl_estrada ON tbl_intersecao.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_intersecao.denivel like '%" . $intrs .  "%'  AND tbl_intersecao.data = CURDATE()  ORDER BY tbl_intersecao.pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function TabIntersecao($intrs) {
        //$sql = "SELECT * FROM tbl_intersecao WHERE id_estrada = '$intrs'  AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
       
        $sql = "SELECT tbl_intersecao.id_intrs, tbl_intersecao.data, tbl_intersecao.id_estrada, tbl_estrada.codigo, tbl_intersecao.pkinicio, tbl_intersecao.pkfim, tbl_intersecao.lat_c, tbl_intersecao.lat_n, tbl_intersecao.long_c, tbl_intersecao.long_n, tbl_intersecao.altitude, tbl_intersecao.desniv, tbl_intersecao.denivel, tbl_intersecao.sentido,tbl_intersecao.ass
        FROM tbl_intersecao INNER JOIN tbl_estrada ON tbl_intersecao.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_intersecao.id_estrada = '$intrs'  AND tbl_intersecao.data < CURDATE() AND tbl_intersecao.alt = 0 AND tbl_intersecao.arq = 0 ORDER BY tbl_intersecao.pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function CarregaIntersecao($cod) {
        $sql = "SELECT * FROM tbl_intersecao WHERE id_intrs = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $intrs = new Intersecao($registo['id_intrs'], $registo['alt'], $registo['reg'],$registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['desniv'], $registo['denivel'], $registo['sentido']);
        $this->conexao->desconectar();
        return $intrs;
    }
      public function ExportExcel(){
        
        $sql = "SELECT tbl_intersecao.id_intrs, tbl_intersecao.id_estrada, tbl_estrada.codigo, tbl_intersecao.pkinicio, tbl_intersecao.pkfim, tbl_intersecao.lat_c, tbl_intersecao.lat_n, tbl_intersecao.long_c, tbl_intersecao.long_n, tbl_intersecao.altitude, tbl_intersecao.desniv, tbl_intersecao.denivel, tbl_intersecao.sentido
        FROM tbl_intersecao INNER JOIN tbl_estrada ON tbl_intersecao.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_intersecao.arq = 0";
        
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_intersecao.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_intersecao INNER JOIN tbl_estrada ON tbl_intersecao.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_intersecao.alt = 0 AND tbl_intersecao.arq = 0
        GROUP BY tbl_intersecao.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    //----------------------------RECTIFICAR--------------------------------------------------
     public function CarregaIntersecaoRect($cod) {
        $sql = "SELECT * FROM tbl_intersecao WHERE id_intrs = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $intrs = new Intersecao($registo['id_intrs'], $registo['alt'], $registo['reg'],$registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['desniv'], $registo['denivel'], $registo['sentido'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $intrs;
    }
     public function LocalizarRect($intrs) {
        $sql = "SELECT * FROM tbl_intersecao WHERE id_estrada = '$intrs' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($intrs) {
        $sql = "UPDATE tbl_intersecao SET alt = '" . $intrs->getAlt() .
                "',reg = '" . $intrs->getReg() .
                "',id_estrada = '" . $intrs->getId_estrada() .
                "',data = '" . $intrs->getData() .
                "',hora = '" . $intrs->getHora() .
                "',pkinicio = '" . $intrs->getPkinicio() .
                "',pkfim = '" . $intrs->getPkfim() .
                "',lat_c = '" . $intrs->getLat_c() .
                "',lat_n = '" . $intrs->getLat_n() .
                "',long_c = '" . $intrs->getLong_c() .
                "',long_n = '" . $intrs->getLong_n() .
                "',altitude = '" . $intrs->getAltitude() .
                "',desniv = '" . $intrs->getDesniv() .
                "',denivel = '" . $intrs->getDenivel() .
                "',sentido = '" . $intrs->getSentido() .
                "',arq = '" . $intrs->getArq() .
                "',data_arq = '" . $intrs->GetData_arq(). "'WHERE id_intrs =" . $intrs->GetId_intrs();
        // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    
    //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelIntersecao(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_intersecao.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_intersecao.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_intersecao.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_intersecao.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_intersecao.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_intersecao.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_intersecao.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_intersecao.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_intersecao.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_intersecao.*
        FROM tbl_estrada INNER JOIN tbl_intersecao ON tbl_estrada.id_estrada = tbl_intersecao.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_intersecao.arq = 0";
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
