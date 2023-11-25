<?php
require_once 'Conexao.php"';
require_once 'EstradaFicha.php"';
require_once 'Estrada.php';
class DALEstrada {
    private $conexao;
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($estrada) {
        $sql = "INSERT INTO tbl_estrada (codigo,tutela,classe,ilha,nseq,estatuto,extensao,
                 toponimo,pontosext,altitd_pki, lat_ci, lat_ni, long_ci, long_ni,
                 altitd_pkf,lat_cf, lat_nf, long_cf, long_nf, orient)VALUES('";
        $sql = $sql . $estrada->GetCodigo() . "','";
        $sql = $sql . $estrada->GetTutela() . "','";
        $sql = $sql . $estrada->GetClasse() . "','";
        $sql = $sql . $estrada->GetIlha() . "','";
        $sql = $sql . $estrada->GetNseq() . "','";
        $sql = $sql . $estrada->GetEstatuto() . "','";       
        $sql = $sql . $estrada->GetExtensao() . "','";
        $sql = $sql . $estrada->GetToponimo() . "','";
        $sql = $sql . $estrada->GetPontosext() . "','";
        $sql = $sql . $estrada->GetAltitd_pki() . "','";
        $sql = $sql . $estrada->GetLat_ci() . "','";
        $sql = $sql . $estrada->GetLat_ni() . "','";
        $sql = $sql . $estrada->GetLong_ci() . "','";
        $sql = $sql . $estrada->GetLong_ni() . "','";
        $sql = $sql . $estrada->GetAltitd_pkf() . "','";
        $sql = $sql . $estrada->GetLat_cf() . "','";
        $sql = $sql . $estrada->GetLat_nf() . "','";
        $sql = $sql . $estrada->GetLong_cf() . "','";
        $sql = $sql . $estrada->GetLong_nf() . "','";
        $sql = $sql . $estrada->GetOrient() . "')"; 
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($estrada) {
        $sql = "UPDATE tbl_estrada SET codigo = '" . $estrada->getCodigo() .
                "',tutela = '" . $estrada->getTutela() .
                "',classe = '" . $estrada->getClasse() .
                "',ilha = '" . $estrada->getIlha() .
                "',nseq = '" . $estrada->getNseq() .
                "',estatuto = '" . $estrada->getEstatuto() .
                "',extensao = '" . $estrada->getExtensao() .
                "',toponimo = '" . $estrada->GetToponimo() .  
                "',pontosext = '" . $estrada->GetPontosext() .
                "',altitd_pki = '" . $estrada->getAltitd_pki() .
                "',lat_ci = '" . $estrada->getLat_ci() .
                "',lat_ni = '" . $estrada->getLat_ni() .
                "',long_ci = '" . $estrada->getLong_ci() .
                "',long_ni = '" . $estrada->getLong_ni() .
                "',altitd_pkf = '" . $estrada->getAltitd_pkf() .
                "',lat_cf = '" . $estrada->getLat_cf() .
                "',lat_nf = '" . $estrada->getLat_nf() .
                "',long_cf = '" . $estrada->getLong_cf() .
                "',long_nf = '" . $estrada->getLong_nf() .
                "',orient = '" . $estrada->getOrient() . "'WHERE id_estrada =" . $estrada->getId_estrada();
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();  
    }

    public function Excluir($estrada) {
        $sql = "DELETE FROM tbl_estrada WHERE id_estrada = $estrada";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
       
    }

    public function Localizar($cod) {
        $sql = "SELECT * FROM tbl_estrada WHERE codigo like '%" . $cod . "%' AND arq = 0";
        
      //  echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaEstrada($cod) {
        $sql = "SELECT * FROM tbl_estrada WHERE id_estrada = $cod AND arq = 0" ;
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $estrada = new Estrada($registo['id_estrada'],$registo['codigo'],$registo['tutela'],$registo['classe'],$registo['ilha']
                ,$registo['nseq'],$registo['estatuto'],$registo['extensao']
                ,$registo['toponimo'],$registo['pontosext'],$registo['altitd_pki']
                ,$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'],$registo['altitd_pkf']
                ,$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf'],$registo['orient']);
        $this->conexao->desconectar();
        return $estrada;  
     }
      public function TabEstrada($estrada){
         $sql = "SELECT * FROM tbl_estrada WHERE id_estrada = '$estrada' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //-------------------------------- EXPORT ERXCEL ------------------------------------------------------------------
     public function ExportExcel(){        
        $sql = "SELECT * FROM tbl_estrada WHERE arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
      public function ExportExcelSAntao(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Santo Antão' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSVicente(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'São Vicente' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'São Nicolau' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Sal' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Boa Vista' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Maio' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Santiago' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Fogo' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
        $sql = "SELECT * FROM tbl_estrada WHERE ilha = 'Brava' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
//-------------------------------------------------------------------------------------------------------------------------
     public function Extensoes($ilha) {
        $sql = "SELECT ROUND (SUM(extensao),3) as SOMA, extensao,ilha FROM tbl_estrada WHERE ilha = '$ilha' AND arq = 0";
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExtensoesTotal() {
        $sql = "SELECT ROUND(SUM(extensao),3) as SOMA, extensao FROM tbl_estrada WHERE arq = 0";
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
//------------------------------------------------------------------------------------------------------------------------------
     
    function getConexao() { 
        return $this->conexao;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
