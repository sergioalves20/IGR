<?php
require_once 'Conexao.php';
require_once 'SobraEstradaTipo.php';
class DALSobraEstradaTipo {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($sobratipo) {
        $sql = "INSERT INTO tbl_sobratipo (alt,reg, id_sobra, id_estrada, data, hora, pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf, terrabat, pedra, revsuperf, bb, bclas,sentido, ass)VALUES('";
        $sql = $sql . $sobratipo->getAlt() . "','";
        $sql = $sql . $sobratipo->getReg() . "','";
        $sql = $sql . $sobratipo->getId_sobra() . "','";
        $sql = $sql . $sobratipo->getId_estrada() . "','";
        $sql = $sql . $sobratipo->getData() . "','";
        $sql = $sql . $sobratipo->getHora() . "','";
        $sql = $sql . $sobratipo->getPkinicio() . "','";
        $sql = $sql . $sobratipo->getAltitd_pki() . "','";
        $sql = $sql . $sobratipo->getLat_ci() . "','";
        $sql = $sql . $sobratipo->getLat_ni() . "','";
        $sql = $sql . $sobratipo->getLong_ci() . "','";
        $sql = $sql . $sobratipo->getLong_ni() . "','";
        $sql = $sql . $sobratipo->getPkfim() . "','";
        $sql = $sql . $sobratipo->getAltitd_pkf() . "','";
        $sql = $sql . $sobratipo->getLat_cf() . "','";
        $sql = $sql . $sobratipo->getLat_nf() . "','";
        $sql = $sql . $sobratipo->getLong_cf() . "','";
        $sql = $sql . $sobratipo->getLong_nf() . "','";   
        $sql = $sql . $sobratipo->getTerrabat() . "','";
        $sql = $sql . $sobratipo->getPedra() . "','";
        $sql = $sql . $sobratipo->getRevsuperf() . "','";
        $sql = $sql . $sobratipo->getBb() . "','";
        $sql = $sql . $sobratipo->getBclas() . "','";
        $sql = $sql . $sobratipo->getSentido() . "','";
        $sql = $sql . $sobratipo->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($sobratipo) {
        $sql = "UPDATE tbl_sobratipo SET alt = '" . $sobratipo->getAlt() .
                "',reg = '" . $sobratipo->getReg() .
                "',id_sobra = '" . $sobratipo->getId_sobra() .
                "',id_estrada = '" . $sobratipo->getId_estrada() .
                "',data = '" . $sobratipo->getData() .
                "',hora = '" . $sobratipo->getHora() .
                "',pkinicio = '" . $sobratipo->getPkinicio() .
                "',altitd_pki = '" . $sobratipo->getAltitd_pki() .
                "',lat_ci = '" . $sobratipo->getLat_ci() .
                "',lat_ni = '" . $sobratipo->getLat_ni() .
                "',long_ci = '" . $sobratipo->getLong_ci() .
                "',long_ni = '" . $sobratipo->getLong_ni() .
                "',pkfim = '" . $sobratipo->getPkfim() .
                "',altitd_pkf = '" . $sobratipo->getAltitd_pkf() .
                "',lat_cf = '" . $sobratipo->getLat_cf() .
                "',lat_nf = '" . $sobratipo->getLat_nf() .
                "',long_cf = '" . $sobratipo->getLong_cf() .
                "',long_nf = '" . $sobratipo->getLong_nf() .
                "',terrabat = '" . $sobratipo->getTerrabat() .
                "',pedra = '" . $sobratipo->getPedra() .
                "',revsuperf = '" . $sobratipo->getRevsuperf() .
                "',bb = '" . $sobratipo->getBb() .
                "',bclas = '" . $sobratipo->getBclas() .
                "',sentido = '" . $sobratipo->getSentido() .
                "',ass = '" . $sobratipo->getAss() . "'WHERE id_sobratipo =" . $sobratipo->GetId_sobratipo();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Excluir($sobratipo) {
        $sql = "DELETE FROM tbl_sobratipo WHERE id_sobratipo =  $sobratipo";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Localizar(){
        $sql = "SELECT * FROM tbl_sobratipo WHERE  data = CURDATE() ORDER BY pkinicio ";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabSobratipo($sobratipo){
        $sql = "SELECT * FROM tbl_sobratipo WHERE id_estrada = '$sobratipo' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function CarregaSobratipo($cod) {
        $sql = "SELECT * FROM tbl_sobratipo WHERE id_sobratipo = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array(); 
        $sobratipo = new SobraTipo($registo['id_sobratipo'],$registo['alt'],$registo['reg'],$registo['id_sobra'], $registo['id_estrada'], $registo['data'], $registo['hora']
                ,$registo['pkinicio'],$registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni']
                ,$registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf']
                ,$registo['terrabat'], $registo['pedra'], $registo['revsuperf'], $registo['bb'], $registo['bclas'], $registo['sentido'], $registo['ass']);   
        $this->conexao->desconectar();
        return $sobratipo;
    }
     public function ListaEstradas() {
        $sql = " SELECT tbl_sobratipo.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_sobratipo.alt = 0 AND tbl_sobratipo.arq = 0
        GROUP BY tbl_sobratipo.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelSobraEstradaTipo(){
        $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_sobratipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_sobratipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_sobratipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_sobratipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_sobratipo.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
          $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_sobratipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_sobratipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_sobratipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_sobratipo.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql="SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobratipo.*
        FROM tbl_estrada INNER JOIN tbl_sobratipo ON tbl_estrada.id_estrada = tbl_sobratipo.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_sobratipo.arq = 0";
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
