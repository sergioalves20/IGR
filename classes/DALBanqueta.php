<?php
require_once 'Conexao.php';
require_once 'EstradaFicha.php';
require_once 'Banqueta.php';
class DALBanqueta {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($banq) {
        $sql = "INSERT INTO tbl_banqueta (alt,reg,id_talude, id_estrada,
                                          data,hora,banqueta,dstpetal,compt,largura,
                                          drcrista,material,lrgdrcrista,cptdrcrista,profund,ass)VALUES('";
        $sql = $sql . $banq->getAlt() . "','";
        $sql = $sql . $banq->getReg() . "','";
        $sql = $sql . $banq->getId_talude() . "','";
        $sql = $sql . $banq->GetId_estrada() . "','"; 
        $sql = $sql . $banq->GetData() . "','";
        $sql = $sql . $banq->GetHora() . "','";
        $sql = $sql . $banq->getBanqueta() . "','";
        $sql = $sql . $banq->getDstpetal() . "','";
        $sql = $sql . $banq->getCompt() . "','";
        $sql = $sql . $banq->getLargura() . "','";
        $sql = $sql . $banq->getDrcrista() . "','";
        $sql = $sql . $banq->getMaterial() . "','";
        $sql = $sql . $banq->getLrgdrcrista() . "','";
        $sql = $sql . $banq->getCptdrcrista() . "','";
        $sql = $sql . $banq->getProfund() . "','";
        $sql = $sql . $banq->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($banq) {
        $sql = "UPDATE tbl_banqueta SET alt = '" . $banq->getAlt() .
                "',reg = '" . $banq->getReg() .
                 "',id_talude = '" . $banq->getId_talude() .
                "',id_estrada = '" . $banq->getId_estrada() .
                "',data = '" . $banq->getData() .
                "',hora = '" . $banq->getHora() .
                "',banqueta = '" . $banq->getBanqueta() .
                "',dstpetal = '" . $banq->getDstpetal() .
                "',compt = '" . $banq->getCompt() .
                "',largura = '" . $banq->getLargura() .
                "',drcrista = '" . $banq->getDrcrista() .
                "',material = '" . $banq->getMaterial() .
                "',lrgdrcrista = '" . $banq->getLrgdrcrista() .
                "',cptdrcrista = '" . $banq->getCptdrcrista() .
                "',profund = '" . $banq->getProfund() .
                "',ass = '" . $banq->GetAss() . "'WHERE id_banqueta =" . $banq->getId_banqueta();
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Excluir($banq) {
        $sql = "DELETE FROM tbl_banqueta WHERE id_banqueta = $banq";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Localizar() {
        $sql = "SELECT * FROM tbl_banqueta WHERE data = CURDATE() ORDER BY banqueta";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function LocalizarAlterar() {
        $sql = "SELECT * FROM tbl_banqueta WHERE arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabBanqueta($banq) {
        $sql = "SELECT * FROM tbl_banqueta WHERE id_talude = '$banq' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY banqueta";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaBanqueta($cod) {
        $sql = "SELECT * FROM tbl_banqueta WHERE id_banqueta = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
       
        $banq = new Banqueta($registo['id_banqueta'],$registo['alt'],$registo['reg'],$registo['id_talude'], $registo['id_estrada'],
                                          $registo['data'],$registo['hora'],$registo['banqueta'],$registo['dstpetal'],$registo['compt'],$registo['largura'],
                                          $registo['drcrista'],$registo['material'],$registo['lrgdrcrista'],$registo['cptdrcrista'],$registo['profund']);                                              
        $this->conexao->desconectar();
        return $banq;
    }
   
     public function LocalizarMat($registo) {
        $sql = "SELECT * FROM tbl_banqueta WHERE material = $registo";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }   
    //---------------------------RECTIFICAR-----------------------------------------
    public function CarregaBanquetaRect($cod) {
        $sql = "SELECT * FROM tbl_banqueta WHERE id_banqueta = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();      
        $banq = new Banqueta($registo['id_banqueta'],$registo['alt'],$registo['reg'],$registo['id_talude'], $registo['id_estrada'],
                                          $registo['data'],$registo['hora'],$registo['banqueta'],$registo['dstpetal'],$registo['compt'],$registo['largura'],
                                          $registo['drcrista'],$registo['material'],$registo['lrgdrcrista'],$registo['cptdrcrista'],$registo['profund'],$registo['ass'],$registo['arq'],$registo['data_arq']);                                              
        $this->conexao->desconectar();
        return $banq;
    }
     public function LocalizarRect($banq) {
        $sql = "SELECT * FROM tbl_banqueta WHERE id_estrada = '$banq' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }   
     public function Rectificar($banq) {
        $sql = "UPDATE tbl_banqueta SET alt = '" . $banq->getAlt() .
                "',reg = '" . $banq->getReg() .
                "',id_talude = '" . $banq->getId_talude() .
                "',id_estrada = '" . $banq->getId_estrada() .
                "',data = '" . $banq->getData() .
                "',hora = '" . $banq->getHora() .
                "',banqueta = '" . $banq->getBanqueta() .
                "',dstpetal = '" . $banq->getDstpetal() .
                "',compt = '" . $banq->getCompt() .
                "',largura = '" . $banq->getLargura() .
                "',drcrista = '" . $banq->getDrcrista() .
                "',material = '" . $banq->getMaterial() .
                "',lrgdrcrista = '" . $banq->getLrgdrcrista() .
                "',cptdrcrista = '" . $banq->getCptdrcrista() .
                "',profund = '" . $banq->getProfund() .
                "',arq = '" . $banq->getArq() .
                "',data_arq = '" . $banq->GetData_arq()."'WHERE id_banqueta =" . $banq->getId_banqueta();
         //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_banqueta.alt = 0 AND tbl_banqueta.arq = 0
        GROUP BY tbl_banqueta.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //--------------------- EXCEL ------------------------------------------------------------
    
      public function ExportExcelTaludes(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_banqueta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_banqueta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_banqueta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_banqueta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_banqueta.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_banqueta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_banqueta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_banqueta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_banqueta.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_banqueta.*
        FROM tbl_estrada INNER JOIN tbl_banqueta ON tbl_estrada.id_estrada = tbl_banqueta.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_banqueta.arq = 0";
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
