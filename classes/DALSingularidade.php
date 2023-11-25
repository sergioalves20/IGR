<?php
require_once 'conexao.php';
require_once 'EstradaFicha.php';
require_once 'Singularidade.php';
class DALSingularidade {
    private $conexao;
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($sing) {
        $sql = "INSERT INTO tbl_singularidade (alt,reg,id_estrada,data,hora,pkinicio,pkfim,lat_c,lat_n,
                                               long_c,long_n,altitude,singularidade,ass)VALUES('";
        $sql = $sql . $sing->GetAlt() . "','";
        $sql = $sql . $sing->GetReg() . "','";
        $sql = $sql . $sing->GetId_estrada() . "','";
        $sql = $sql . $sing->GetData() . "','";
        $sql = $sql . $sing->GetHora() . "','";
        $sql = $sql . $sing->GetPkinicio() . "','";
        $sql = $sql . $sing->GetPkfim() . "','";
        $sql = $sql . $sing->GetLat_c() . "','";
        $sql = $sql . $sing->GetLat_n() . "','";
        $sql = $sql . $sing->GetLong_c() . "','";
        $sql = $sql . $sing->GetLong_n() . "','";
        $sql = $sql . $sing->GetAltitude() . "','";
        $sql = $sql . $sing->GetSingularidade() . "','";
        $sql = $sql . $sing->GetAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
        
         if (!$sql){
                echo "<script type=\"text/javascript\"> alert('Ocorreu um erro!');</script>";
            }else{
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }
    }
    public function Alterar($sing) {       
        $sql = "UPDATE tbl_singularidade SET alt = '" . $sing->getAlt() .
                "',reg = '" . $sing->getReg() .
                "',id_estrada = '" . $sing->getId_estrada() .
                "',data = '" . $sing->getData() .
                "',hora = '" . $sing->getHora() .
                "',pkinicio = '" . $sing->getPkinicio() .
                "',pkfim = '" . $sing->getPkfim() .
                "',lat_c = '" . $sing->getLat_c() .
                "',lat_n = '" . $sing->getLat_n() .
                "',long_c = '" . $sing->getLong_c() .
                "',long_n = '" . $sing->getLong_n() .
                "',altitude = '" . $sing->getAltitude() .
                "',singularidade = '" . $sing->getSingularidade() .
                "',ass = '" . $sing->GetAss(). "'WHERE id_sing =" . $sing->getId_sing();              
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
   
    public function Excluir($sing) {
        $sql = "DELETE FROM tbl_singularidade WHERE id_sing = $sing";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Localizar($sing) {
        $sql = "SELECT * FROM tbl_singularidade WHERE singularidade like '%" . $sing . "%'AND data = CURDATE()";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function TabSingularidade($sing) {
     $sql = "SELECT * FROM tbl_singularidade
             WHERE id_estrada = '$sing' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
    //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }    
     public function CarregaSingularidade($cod) {
        $sql = "SELECT * FROM tbl_singularidade WHERE id_sing = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $sing = new Singularidade($registo['id_sing'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['data'],$registo['hora'],$registo['pkinicio'],$registo['pkfim'],$registo['lat_c'],$registo['lat_n'],$registo['long_c'],$registo['long_n'],$registo['altitude'],$registo['singularidade']);                                              
        $this->conexao->desconectar();
        return $sing;
    } 
    public function ListaEstradas() {
        $sql = "SELECT tbl_singularidade.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_singularidade INNER JOIN tbl_estrada ON tbl_singularidade.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_singularidade.alt = 0 AND tbl_singularidade.arq = 0
        GROUP BY tbl_singularidade.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    //----------------------------RECTIFICAR--------------------------------------------------
     
      public function CarregaSingularidadeRect($cod) {
        $sql = "SELECT * FROM tbl_singularidade WHERE id_sing = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $sing = new Singularidade($registo['id_sing'],$registo['alt'],$registo['reg'],$registo['id_estrada'],$registo['data'],$registo['hora'],$registo['pkinicio'],$registo['pkfim'],$registo['lat_c'],$registo['lat_n'],$registo['long_c'],$registo['long_n'],$registo['altitude'],$registo['singularidade'],$registo['ass'],$registo['arq'],$registo['data_arq']);                                              
        $this->conexao->desconectar();
        return $sing;
    } 
     public function LocalizarRect($sing) {
        $sql = "SELECT * FROM tbl_singularidade WHERE id_estrada = '$sing' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($sing) {      
        $sql = "UPDATE tbl_singularidade SET alt = '" . $sing->getAlt() .
                "',reg = '" . $sing->getReg() .
                "',id_estrada = '" . $sing->getId_estrada() .
                "',data = '" . $sing->getData() .
                "',hora = '" . $sing->getHora() .
                "',pkinicio = '" . $sing->getPkinicio() .
                "',pkfim = '" . $sing->getPkfim() .
                "',lat_c = '" . $sing->getLat_c() .
                "',lat_n = '" . $sing->getLat_n() .
                "',long_c = '" . $sing->getLong_c() .
                "',long_n = '" . $sing->getLong_n() .
                "',altitude = '" . $sing->getAltitude() .
                "',singularidade = '" . $sing->getSingularidade() .
                "',arq = '" . $sing->getArq() .
                "',data_arq = '" . $sing->GetData_arq(). "'WHERE id_sing =" . $sing->getId_sing();              
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    
      //-------------------    EXCEL  ----------------------------
    
     public function ExportExcelSing(){        
      $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_singularidade.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_singularidade.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_singularidade.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_singularidade.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_singularidade.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_singularidade.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_singularidade.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
         $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_singularidade.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_singularidade.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_singularidade.*
        FROM tbl_estrada INNER JOIN tbl_singularidade ON tbl_estrada.id_estrada = tbl_singularidade.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_singularidade.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //-----------------------------------------------
    function getConexao() {
        return $this->conexao;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
 
           