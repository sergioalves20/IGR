<?php

require_once 'Conexao.php';
require_once 'Iri.php';

class DALIri {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($ciri) {
        $sql = "INSERT INTO tbl_iri (alt,reg,id_estrada,id_trecho,data,hora,via,iri,ass) VALUES ('";
        $sql = $sql . $ciri->getAlt() . "','";
        $sql = $sql . $ciri->getReg() . "','";
        $sql = $sql . $ciri->getId_estrada() . "','";
        $sql = $sql . $ciri->getId_trecho() . "','";
        $sql = $sql . $ciri->getData() . "','";
        $sql = $sql . $ciri->getHora() . "','";
        $sql = $sql . $ciri->getVia() . "','";
        $sql = $sql . $ciri->getIri() . "','";
        $sql = $sql . $ciri->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($ciri) {
        $sql = "UPDATE tbl_iri SET alt = '" . $ciri->getAlt() .
                "',reg = '" . $ciri->getReg() .
                "',id_estrada = '" . $ciri->getId_estrada() .
                "',id_trecho = '" . $ciri->getId_trecho() .
                "',data = '" . $ciri->getData() .
                "',hora = '" . $ciri->getHora() .
                "',via = '" . $ciri->getVia() .
                "',iri = '" . $ciri->getIri() .
                "',ass = '" . $ciri->getAss() . "'WHERE id_iri =" . $ciri->GetId_iri();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($ciri) {
        $sql = "DELETE FROM tbl_iri WHERE id_iri = $ciri";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_iri WHERE data = CURDATE()";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
   public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_iri WHERE  data < CURDATE()";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabIri($ciri) {
        $sql = "SELECT * FROM tbl_iri WHERE id_estrada = '$ciri' AND data < CURDATE()AND alt = 0 AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaIri($cod) {
        $sql = "SELECT * FROM tbl_iri WHERE id_iri = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ciri = new Iri($registo['id_iri'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['id_trecho'],$registo['data'], $registo['hora'], $registo['via'],$registo['iri'],$registo['ass']);
        $this->conexao->desconectar();
        return $ciri;
    }
    //-------------------------RECTIFICAR---------------------------
     public function CarregaIriRect($cod) {
        $sql = "SELECT * FROM tbl_iri WHERE id_iri = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ciri = new Iri($registo['id_iri'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['id_trecho'],$registo['data'], $registo['hora'], $registo['via'],$registo['iri'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $ciri;
    }
    public function LocalizarRect($ciri) {
        $sql = "SELECT * FROM tbl_iri WHERE id_estrada = '$ciri' AND arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function Rectificar($ciri) {
        $sql = "UPDATE tbl_iri SET alt = '" . $ciri->getAlt() .
                "',reg = '" . $ciri->getReg() .
                "',id_estrada = '" . $ciri->getId_estrada() .
                "',id_trecho = '" . $ciri->getId_trecho() .
                "',data = '" . $ciri->getData() .
                "',hora = '" . $ciri->getHora() .
                "',via = '" . $ciri->getVia() .
                "',iri = '" . $ciri->getIri() .
                "',arq = '" . $ciri->getArq() .
                "',data_arq = '" . $ciri->GetData_arq(). "'WHERE id_iri =" . $ciri->GetId_iri();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_iri.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_iri INNER JOIN tbl_estrada ON tbl_iri.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_iri.alt = 0 AND tbl_iri.arq = 0
        GROUP BY tbl_iri.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelIri(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_iri.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_iri.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_iri.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_iri.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_iri.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_iri.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_iri.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_iri.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_iri.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_iri.*
        FROM tbl_estrada INNER JOIN tbl_iri ON tbl_estrada.id_estrada = tbl_iri.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_iri.arq = 0";
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
