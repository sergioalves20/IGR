 <?php
require_once 'Conexao.php';
require_once 'Bermas.php';
class DALBermas {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($bermas) {
        $sql = "INSERT INTO tbl_bermas (alt,reg,id_estrada,data,hora,pkinicio,altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,larg,sentido,ass) VALUES ('";
        $sql = $sql . $bermas->getAlt() . "','";
        $sql = $sql . $bermas->getReg() . "','";
        $sql = $sql . $bermas->getId_estrada() . "','";
        $sql = $sql . $bermas->getData() . "','";
        $sql = $sql . $bermas->getHora() . "','";
        $sql = $sql . $bermas->getPkinicio() . "','";
        $sql = $sql . $bermas->getAltitd_pki() . "','";
        $sql = $sql . $bermas->getLat_ci() . "','";
        $sql = $sql . $bermas->getLat_ni() . "','";
        $sql = $sql . $bermas->getLong_ci() . "','";
        $sql = $sql . $bermas->getLong_ni() . "','";
        $sql = $sql . $bermas->getPkfim() . "','";
        $sql = $sql . $bermas->getAltitd_pkf() . "','";
        $sql = $sql . $bermas->getLat_cf() . "','";
        $sql = $sql . $bermas->getLat_nf() . "','";
        $sql = $sql . $bermas->getLong_cf() . "','";
        $sql = $sql . $bermas->getLong_nf() . "','";    
        $sql = $sql . $bermas->getLarg() . "','";
        $sql = $sql . $bermas->getSentido() . "','";
        $sql = $sql . $bermas->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($bermas) {
        $sql = "UPDATE tbl_bermas SET alt = '" . $bermas->getAlt() .
                "',reg = '" . $bermas->getReg() .
                "',id_estrada = '" . $bermas->getId_estrada() .
                "',data = '" . $bermas->getData() .
                "',hora = '" . $bermas->getHora() .
                "',pkinicio = '" . $bermas->getPkinicio() .
                "',altitd_pki = '" . $bermas->getAltitd_pki() .
                "',lat_ci = '" . $bermas->getLat_ci() .
                "',lat_ni = '" . $bermas->getLat_ni() .
                "',long_ci = '" . $bermas->getLong_ci() .
                "',long_ni = '" . $bermas->getLong_ni() .
                "',pkfim = '" . $bermas->getPkfim() .
                "',altitd_pkf = '" . $bermas->getAltitd_pkf() .
                "',lat_cf = '" . $bermas->getLat_cf() .
                "',lat_nf = '" . $bermas->getLat_nf() .
                "',long_cf = '" . $bermas->getLong_cf() .
                "',long_nf = '" . $bermas->getLong_nf() .
                "',larg = '" . $bermas->getLarg() .
                "',sentido = '" . $bermas->getSentido() .           
                "',ass = '" . $bermas->getAss() . "'WHERE id_berma =" . $bermas->GetId_berma();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($bermas) {
        $sql = "DELETE FROM tbl_bermas WHERE id_berma = '$bermas'";
       // echo $sql;
        $this->conexao->Conectar();       
        $banco = $this->conexao->getBanco();       
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
        
    }

    public function Localizar($bermas) {
        $sql = "SELECT * FROM tbl_bermas WHERE sentido = '$bermas' AND data = CURDATE() ORDER BY pkinicio ";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      
    public function TabBermas($bermas){
        $sql = "SELECT * FROM tbl_bermas WHERE id_estrada = '$bermas' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
  public function CarregaBermas($cod) {
        $sql = "SELECT * FROM tbl_bermas WHERE id_berma = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermas = new Bermas($registo['id_berma'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['larg'],$registo['sentido'],$registo['ass']);
        $this->conexao->desconectar();
        return $bermas;
    }   
  public function ListaEstradas() {
        $sql = "SELECT tbl_bermas.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_bermas INNER JOIN tbl_estrada ON tbl_bermas.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_bermas.alt = 0 AND tbl_bermas.arq = 0
        GROUP BY tbl_bermas.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    //----------------------------RECTIFICAR--------------------------------------------------
     public function CarregaBermasRect($cod) {
        $sql = "SELECT * FROM tbl_bermas WHERE id_berma = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $bermas = new Bermas($registo['id_berma'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['altitd_pki'],$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'], $registo['pkfim'],$registo['altitd_pkf'],$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['larg'],$registo['sentido'],$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $bermas;
    }
    public function LocalizarRect($bermas) {
        $sql = "SELECT * FROM tbl_bermas WHERE id_estrada = '$bermas' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($bermas) {
        $sql = "UPDATE tbl_bermas SET alt = '" . $bermas->getAlt() .
                "',reg = '" . $bermas->getReg() .
                "',id_estrada = '" . $bermas->getId_estrada() .
                "',data = '" . $bermas->getData() .
                "',hora = '" . $bermas->getHora() .
                "',pkinicio = '" . $bermas->getPkinicio() .
                "',altitd_pki = '" . $bermas->getAltitd_pki() .
                "',lat_ci = '" . $bermas->getLat_ci() .
                "',lat_ni = '" . $bermas->getLat_ni() .
                "',long_ci = '" . $bermas->getLong_ci() .
                "',long_ni = '" . $bermas->getLong_ni() .
                "',pkfim = '" . $bermas->getPkfim() .
                "',altitd_pkf = '" . $bermas->getAltitd_pkf() .
                "',lat_cf = '" . $bermas->getLat_cf() .
                "',lat_nf = '" . $bermas->getLat_nf() .
                "',long_cf = '" . $bermas->getLong_cf() .
                "',long_nf = '" . $bermas->getLong_nf() .
                "',larg = '" . $bermas->getLarg() .
                "',sentido = '" . $bermas->getSentido() .           
                "',arq = '" . $bermas->getArq() .
                "',data_arq = '" . $bermas->GetData_arq(). "'WHERE id_berma =" . $bermas->GetId_berma();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    //------------------- EXCEL ----------------------------
    
     public function ExportExcelBermas(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_bermas.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_bermas.*
        FROM tbl_estrada INNER JOIN tbl_bermas ON tbl_estrada.id_estrada = tbl_bermas.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_bermas.arq = 0";
        //echo $sql;
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
