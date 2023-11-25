 <?php

require_once 'Conexao.php';
require_once 'SobraEstrada.php';

class DALSobraEstrada {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($sobra) {
        $sql = "INSERT INTO tbl_sobra (alt,reg,id_estrada,data,hora,pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,larg,sentido,ass) VALUES ('";
        $sql = $sql . $sobra->getAlt() . "','";
        $sql = $sql . $sobra->getReg() . "','";
        $sql = $sql . $sobra->getId_estrada() . "','";
        $sql = $sql . $sobra->getData() . "','";
        $sql = $sql . $sobra->getHora() . "','";
        $sql = $sql . $sobra->getPkinicio() . "','";
        $sql = $sql . $sobra->getAltitd_pki() . "','";
        $sql = $sql . $sobra->getLat_ci() . "','";
        $sql = $sql . $sobra->getLat_ni() . "','";
        $sql = $sql . $sobra->getLong_ci() . "','";
        $sql = $sql . $sobra->getLong_ni() . "','";
        $sql = $sql . $sobra->getPkfim() . "','";
        $sql = $sql . $sobra->getAltitd_pkf() . "','";
        $sql = $sql . $sobra->getLat_cf() . "','";
        $sql = $sql . $sobra->getLat_nf() . "','";
        $sql = $sql . $sobra->getLong_cf() . "','";
        $sql = $sql . $sobra->getLong_nf() . "','";    
        $sql = $sql . $sobra->getLarg() . "','";
        $sql = $sql . $sobra->getSentido() . "','";
        $sql = $sql . $sobra->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($sobra) {
        $sql = "UPDATE tbl_bermas SET alt = '" . $sobra->getAlt() .
                "',reg = '" . $sobra->getReg() .
                "',id_estrada = '" . $sobra->getId_estrada() .
                "',data = '" . $sobra->getData() .
                "',hora = '" . $sobra->getHora() .
                "',pkinicio = '" . $sobra->getPkinicio() .
                "',altitd_pki = '" . $sobra->getAltitd_pki() .
                "',lat_ci = '" . $sobra->getLat_ci() .
                "',lat_ni = '" . $sobra->getLat_ni() .
                "',long_ci = '" . $sobra->getLong_ci() .
                "',long_ni = '" . $sobra->getLong_ni() .
                "',pkfim = '" . $sobra->getPkfim() .
                "',altitd_pkf = '" . $sobra->getAltitd_pkf() .
                "',lat_cf = '" . $sobra->getLat_cf() .
                "',lat_nf = '" . $sobra->getLat_nf() .
                "',long_cf = '" . $sobra->getLong_cf() .
                "',long_nf = '" . $sobra->getLong_nf() .
                "',larg = '" . $sobra->getLarg() .
                "',sentido = '" . $sobra->getSentido() .           
                "',ass = '" . $sobra->getAss() . "'WHERE id_sobra =" . $sobra->GetId_sobra();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($sobra) {
        $sql = "DELETE FROM tbl_sobra WHERE id_sobra = '$sobra'";
       // echo $sql;
        $this->conexao->Conectar();       
        $banco = $this->conexao->getBanco();       
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
        
    }

    public function Localizar($sobra) {
        $sql = "SELECT * FROM tbl_sobra WHERE sentido = '$sobra' AND data = CURDATE() ORDER BY pkinicio ";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      
    public function TabSobra($sobra){
        $sql = "SELECT * FROM tbl_sobra WHERE id_sobra = '$sobra' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  public function CarregaSobra($cod) {
        $sql = "SELECT * FROM tbl_sobra WHERE id_sobra = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $sobra = new Sobra($registo['id_sobra'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['larg'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $sobra;
    }
    
  public function ListaEstradas() {
        $sql = "SELECT tbl_sobra.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_sobra INNER JOIN tbl_estrada ON tbl_sobra.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_sobra.alt = 0 AND tbl_sobra.arq = 0
        GROUP BY tbl_sobra.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelSobra(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_sobra.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_sobra.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_sobra.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_sobra.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_sobra.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_sobra.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_sobra.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_sobra.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_sobra.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_sobra.*
        FROM tbl_estrada INNER JOIN tbl_sobra ON tbl_estrada.id_estrada = tbl_sobra.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_sobra.arq = 0";
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
