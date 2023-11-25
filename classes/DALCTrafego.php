<!--canoa2018-->
<?php
require_once 'Conexao.php';
require_once 'CTrafego.php';
class DALCtrafego {
    
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    function Inserir($ctrafego) {
        $sql = "INSERT INTO tbl_ctrafego (alt,reg,id_estrada,id_trecho,data,hora,maquina,id_posto,altsolo,disteixo,sentido,horai,horaf,datai,dataf,ndias,vmedia,lig,pes,tmda,ass) VALUES ('";
        $sql = $sql . $ctrafego->getAlt() . "','";
        $sql = $sql . $ctrafego->getReg() . "','";
        $sql = $sql . $ctrafego->getId_estrada() . "','";
        $sql = $sql . $ctrafego->getId_trecho() . "','";
        $sql = $sql . $ctrafego->getData() . "','";
        $sql = $sql . $ctrafego->getHora() . "','";
        $sql = $sql . $ctrafego->getMaquina() . "','";
        $sql = $sql . $ctrafego->getId_posto() . "','";
        $sql = $sql . $ctrafego->getAltsolo() . "','";
        $sql = $sql . $ctrafego->getDisteixo() . "','";
        $sql = $sql . $ctrafego->getSentido() . "','";
        $sql = $sql . $ctrafego->getHorai() . "','";
        $sql = $sql . $ctrafego->getHoraf() . "','";
        $sql = $sql . $ctrafego->getDatai() . "','";
        $sql = $sql . $ctrafego->getDataf() . "','";
        $sql = $sql . $ctrafego->getNdias() . "','";
        $sql = $sql . $ctrafego->getVmedia() . "','";
        $sql = $sql . $ctrafego->getLig() . "','";
        $sql = $sql . $ctrafego->getPes() . "','";
        $sql = $sql . $ctrafego->getTmda() . "','";
        $sql = $sql . $ctrafego->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($ctrafego) {
        $sql = "UPDATE tbl_ctrafego SET alt = '" . $ctrafego->getAlt() .
                "',reg = '" . $ctrafego->getReg() .
                "',id_estrada = '" . $ctrafego->getId_estrada() .
                "',id_trecho = '" . $ctrafego->getId_trecho() .
                "',data = '" . $ctrafego->getData() .
                "',hora = '" . $ctrafego->getHora() .
                "',maquina = '" . $ctrafego->getMaquina() .
                "',id_posto = '" . $ctrafego->getId_posto() .
                "',altsolo = '" . $ctrafego->getAltsolo() .
                "',disteixo = '" . $ctrafego->getDisteixo() .
                "',sentido = '" . $ctrafego->getSentido() .
                "',horai = '" . $ctrafego->getHorai() .
                "',horaf = '" . $ctrafego->getHoraf() .
                "',datai = '" . $ctrafego->getDatai() .
                "',dataf = '" . $ctrafego->getDataf() .
                "',ndias = '" . $ctrafego->getNdias() .
                "',vmedia = '" . $ctrafego->getVmedia() .
                "',lig = '" . $ctrafego->getLig() .
                "',pes = '" . $ctrafego->getPes() .
                "',tmda = '" . $ctrafego->getTmda() .
                "',ass = '" . $ctrafego->getAss() . "'WHERE id_ctrafego =" . $ctrafego->getId_ctrafego();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($ctrafego) {
        $sql = "DELETE FROM tbl_ctrafego WHERE id_ctrafego = $ctrafego";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

   public function Localizar() {
        $sql = "SELECT * FROM tbl_ctrafego WHERE data = CURDATE() ORDER BY data";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_ctrafego WHERE  data < CURDATE() ORDER BY data";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabCTrafego($ctrafego) {
        $sql = "SELECT * FROM tbl_ctrafego WHERE id_estrada = '$ctrafego' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY data";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaCTrafego($cod) {
        $sql = "SELECT * FROM tbl_trafego WHERE id_ctrafego = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ctrafego = new CTrafego($registo['id_ctrafego'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['id_trecho'], $registo['data'],$registo['hora'] ,$registo['maquina'], $registo['id_posto'], $registo['altsolo'], $registo['disteixo'],$registo ['sentido'],$registo['horai'] ,$registo['horaf'] , $registo['datai'],$registo ['dataf'],$registo ['ndias'], $registo['vmedia'], $registo['lig'],$registo ['pes'],$registo['tmda'] ,$registo['ass']);
        $this->conexao->desconectar();
        return $ctrafego;
    }
    
    //--------------------------------- RECTIFICAR -------------------------
    
     public function CarregaCTrafegoRect($cod) {
        $sql = "SELECT * FROM tbl_ctrafego WHERE id_ctrafego = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $ctrafego = new CTrafego($registo['id_ctrafego'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['id_trecho'], $registo['data'],$registo['hora'] ,$registo['maquina'], $registo['id_posto'], $registo['altsolo'], $registo['disteixo'],$registo ['sentido'],$registo['horai'] ,$registo['horaf'] , $registo['datai'],$registo ['dataf'],$registo ['ndias'], $registo['vmedia'], $registo['lig'],$registo ['pes'],$registo['tmda'] ,$registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $ctrafego;
    }
    public function LocalizarRect($ct) {
        $sql = "SELECT * FROM tbl_ctrafego WHERE id_estrada = '$ct' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function Rectificar($ctrafego) {
        $sql = "UPDATE tbl_ctrafego SET alt = '" . $ctrafego->getAlt() .
                "',reg = '" . $ctrafego->getReg() .
                "',id_estrada = '" . $ctrafego->getId_estrada() .
                "',id_trecho = '" . $ctrafego->getId_trecho() .
                "',data = '" . $ctrafego->getData() .
                "',hora = '" . $ctrafego->getHora() .
                "',maquina = '" . $ctrafego->getMaquina() .
                "',id_posto = '" . $ctrafego->getId_posto() .
                "',altsolo = '" . $ctrafego->getAltsolo() .
                "',disteixo = '" . $ctrafego->getDisteixo() .
                "',sentido = '" . $ctrafego->getSentido() .
                "',horai = '" . $ctrafego->getHorai() .
                "',horaf = '" . $ctrafego->getHoraf() .
                "',datai = '" . $ctrafego->getDatai() .
                "',dataf = '" . $ctrafego->getDataf() .
                "',ndias = '" . $ctrafego->getNdias() .
                "',vmedia = '" . $ctrafego->getVmedia() .
                "',lig = '" . $ctrafego->getLig() .
                "',pes = '" . $ctrafego->getPes() .
                "',tmda = '" . $ctrafego->getTmda() .
                "',arq = '" . $ctrafego->getArq() .
                "',data_arq = '" . $ctrafego->GetData_arq(). "'WHERE id_ctrafego =" . $ctrafego->getId_ctrafego();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_ctrafego.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_ctrafego INNER JOIN tbl_estrada ON tbl_ctrafego.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_ctrafego.alt = 0 AND tbl_ctrafego.arq = 0
        GROUP BY tbl_ctrafego.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelCTrafego(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_ctrafego.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_ctrafego.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_ctrafego.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_ctrafego.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_ctrafego.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
           $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_ctrafego.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_ctrafego.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_ctrafego.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_ctrafego.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_ctrafego.*
        FROM tbl_estrada INNER JOIN tbl_ctrafego ON tbl_estrada.id_estrada = tbl_ctrafego.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_ctrafego.arq = 0";
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
