<?php

require_once 'Conexao.php';
require_once 'PContagem.php';

class DALPContagem {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($pcont) {

        $sql = "INSERT INTO tbl_pcontagem (alt,reg, data, hora, id_estrada, pk, sentido, sitio, lat_c, lat_n, long_c, long_n, altitude, ass)VALUES('";
        $sql = $sql . $pcont->GetAlt() . "','";
        $sql = $sql . $pcont->GetReg() . "','";
        $sql = $sql . $pcont->GetData() . "','";
        $sql = $sql . $pcont->GetHora() . "','";
        $sql = $sql . $pcont->GetId_estrada() . "','";
        $sql = $sql . $pcont->getPk() . "','";
        $sql = $sql . $pcont->getSentido() . "','";
        $sql = $sql . $pcont->getSitio() . "','";
        $sql = $sql . $pcont->GetLat_c() . "','";
        $sql = $sql . $pcont->GetLat_n() . "','";
        $sql = $sql . $pcont->GetLong_c() . "','";
        $sql = $sql . $pcont->GetLong_n() . "','";
        $sql = $sql . $pcont->GetAltitude() . "','";
        $sql = $sql . $pcont->GetAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($pcont) {
        $sql = "UPDATE tbl_pcontagem SET alt = '" . $pcont->getAlt() .
                "',reg = '" . $pcont->getReg() .
                "',data = '" . $pcont->getData() .
                "',hora = '" . $pcont->getHora() .
                "',id_estrada = '" . $pcont->getId_estrada() .
                "',pk = '" . $pcont->getPk() .
                "',sentido = '" . $pcont->getSentido() .
                "',sitio = '" . $pcont->getSitio() .
                "',lat_c = '" . $pcont->getLat_c() .
                "',lat_n = '" . $pcont->getLat_n() .
                "',long_c = '" . $pcont->getLong_c() .
                "',long_n = '" . $pcont->getLong_n() .
                "',altitude = '" . $pcont->getAltitude() .
                "',ass = '" . $pcont->GetAss() . "'WHERE id_pcontagem =" . $pcont->GetId_pcontagem();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($pcont) {
        $sql = "DELETE FROM tbl_pcontagem WHERE id_pcontagem = $pcont";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

     public function Localizar() {
        $sql = "SELECT * FROM tbl_pcontagem WHERE data = CURDATE() ORDER BY pk";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_pcontagem WHERE  data < CURDATE() ORDER BY pk";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabPostos($pcont) {
        $sql = "SELECT * FROM tbl_pcontagem WHERE id_estrada = '$pcont' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pk";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaPostos($cod) {
        $sql = "SELECT * FROM tbl_pcontagem WHERE id_pcontagem = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $pcont = new PContagem($registo['id_pcontagem'],$registo['alt'],$registo['reg'],$registo['data'], $registo['hora'],$registo['id_estrada'], $registo['pk'],$registo['sentido'],$registo['sitio'],$registo['lat_c'],$registo['lat_n'],$registo['long_c'],$registo['long_n'],$registo['altitude'],$registo['ass']);
        $this->conexao->desconectar();
        return $pcont;
    }
    //-------------------------- RECTIFICAR --------------------------------------------------------------------
    public function CarregaPostosRect($cod) {
        $sql = "SELECT * FROM tbl_pcontagem WHERE id_pcontagem = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $pcont = new PContagem($registo['id_pcontagem'],$registo['alt'],$registo['reg'],$registo['data'], $registo['hora'],$registo['id_estrada'], $registo['pk'],$registo['sentido'],$registo['sitio'],$registo['lat_c'],$registo['lat_n'],$registo['long_c'],$registo['long_n'],$registo['altitude'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $pcont;
    }
     public function LocalizarRect($pc) {
        $sql = "SELECT * FROM tbl_pcontagem WHERE id_estrada = '$pc' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function Rectificar($pcont) {
        $sql = "UPDATE tbl_pcontagem SET alt = '" . $pcont->getAlt() .
                "',reg = '" . $pcont->getReg() .
                "',data = '" . $pcont->getData() .
                "',hora = '" . $pcont->getHora() .
                "',id_estrada = '" . $pcont->getId_estrada() .
                "',pk = '" . $pcont->getPk() .
                "',sentido = '" . $pcont->getSentido() .
                "',sitio = '" . $pcont->getSitio() .
                "',lat_c = '" . $pcont->getLat_c() .
                "',lat_n = '" . $pcont->getLat_n() .
                "',long_c = '" . $pcont->getLong_c() .
                "',long_n = '" . $pcont->getLong_n() .
                "',altitude = '" . $pcont->getAltitude() .
                "',arq = '" . $pcont->getArq() .
                "',data_arq = '" . $pcont->GetData_arq(). "'WHERE id_pcontagem =" . $pcont->GetId_pcontagem();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_pcontagem.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_pcontagem INNER JOIN tbl_estrada ON tbl_pcontagem.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_pcontagem.alt = 0 AND tbl_pcontagem.arq = 0
        GROUP BY tbl_pcontagem.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelPContagem(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_pcontagem.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_pcontagem.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_pcontagem.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_pcontagem.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_pcontagem.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_pcontagem.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_pcontagem.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_pcontagem.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_pcontagem.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_pcontagem.*
        FROM tbl_estrada INNER JOIN tbl_pcontagem ON tbl_estrada.id_estrada = tbl_pcontagem.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_pcontagem.arq = 0";
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
