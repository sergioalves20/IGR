<?php

require_once 'Conexao.php';
require_once 'Iq.php';

class DALIq {

    private $conexao;
    
     public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($ind) {

        $sql = "INSERT INTO tbl_iq (alt,reg,id_estrada,id_trecho,data,hora,iq,ass) VALUES ('";
        $sql = $sql . $ind->getAlt() . "','";
        $sql = $sql . $ind->getReg() . "','";
        $sql = $sql . $ind->getId_estrada() . "','";
        $sql = $sql . $ind->getId_trecho() . "','";
        $sql = $sql . $ind->getData() . "','";
        $sql = $sql . $ind->getHora() . "','";
        $sql = $sql . $ind->getIq() . "','";
        $sql = $sql . $ind->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($ind) {

        $sql = "UPDATE tbl_iq SET alt = '" . $ind->getAlt() .
                "',reg = '" . $ind->getReg() .
                "',id_estrada = '" . $ind->getId_estrada() .
                "',id_trecho = '" . $ind->getId_trecho() .
                "',data = '" . $ind->getData() .
                "',hora = '" . $ind->getHora() .
                "',iq = '" . $ind->getIq() .
                "',ass = '" . $ind->getAss() . "'WHERE id_iq =" . $ind->GetId_iq();
         //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($ind) {
        $sql = "DELETE FROM tbl_iq WHERE id_iq = $ind";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

     public function Localizar() {
        $sql = "SELECT * FROM tbl_iq WHERE data = CURDATE()";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
   public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_iq WHERE  data < CURDATE()";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabIq($ind) {
        $sql = "SELECT * FROM tbl_iq WHERE id_estrada = '$ind' AND data < CURDATE()AND alt = 0 AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaIq($cod) {
        $sql = "SELECT * FROM tbl_iq WHERE id_iq = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ind = new Iq($registo['id_iq'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['id_trecho'],$registo['data'], $registo['hora'], $registo['iq'],$registo['ass']);
        $this->conexao->desconectar();
        return $ind;
    }
     public function CarregaIqRect($cod) {
        $sql = "SELECT * FROM tbl_iq WHERE id_iq = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ind = new Iq($registo['id_iq'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['id_trecho'],$registo['data'], $registo['hora'], $registo['iq'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $ind;
    }
    public function LocalizarRect($iq) {
        $sql = "SELECT * FROM tbl_iq WHERE id_estrada = '$iq' AND arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($ind) {
        $sql = "UPDATE tbl_iq SET alt = '" . $ind->getAlt() .
                "',reg = '" . $ind->getReg() .
                "',id_estrada = '" . $ind->getId_estrada() .
                "',id_trecho = '" . $ind->getId_trecho() .
                "',data = '" . $ind->getData() .
                "',hora = '" . $ind->getHora() .
                "',iq = '" . $ind->getIq() .
                "',arq = '" . $ind->getArq() .
                "',data_arq = '" . $ind->GetData_arq(). "'WHERE id_iq =" . $ind->GetId_iq();
         //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_iq.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_iq INNER JOIN tbl_estrada ON tbl_iq.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_iq.alt = 0 AND tbl_iq.arq = 0
        GROUP BY tbl_iq.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelIq(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_iq.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_iq.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_iq.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = '' AND tbl_iq.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_iq.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_iq.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_iq.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = '' AND tbl_iq.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_iq.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iq.*
        FROM tbl_estrada INNER JOIN tbl_iq ON tbl_estrada.id_estrada = tbl_iq.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_iq.arq = 0";
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
