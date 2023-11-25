<?php
require_once 'Conexao.php';
require_once 'Talude.php';
class DALTalude {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function Inserir($talude) {
        $sql = "INSERT INTO tbl_talude (alt,reg, id_estrada, data, hora, pkinicio, altitd_pki, lat_ci, lat_ni, long_ci, long_ni, pkfim, altitd_pkf, lat_cf, lat_nf, long_cf, long_nf, nat, altura, inclin, tipo, sentido, nbanq, ass)VALUES('";
        $sql = $sql . $talude->GetAlt() . "','";
        $sql = $sql . $talude->GetReg() . "','";
        $sql = $sql . $talude->GetId_estrada() . "','";
        $sql = $sql . $talude->GetData() . "','";
        $sql = $sql . $talude->GetHora() . "','";
        $sql = $sql . $talude->GetPkinicio() . "','";
        $sql = $sql . $talude->getAltitd_pki() . "','";
        $sql = $sql . $talude->getLat_ci() . "','";
        $sql = $sql . $talude->getLat_ni() . "','";
        $sql = $sql . $talude->getLong_ci() . "','";
        $sql = $sql . $talude->getLong_ni() . "','";
        $sql = $sql . $talude->getPkfim() . "','";
        $sql = $sql . $talude->getAltitd_pkf() . "','";
        $sql = $sql . $talude->getLat_cf() . "','";
        $sql = $sql . $talude->getLat_nf() . "','";
        $sql = $sql . $talude->getLong_cf() . "','";
        $sql = $sql . $talude->getLong_nf() . "','";
        $sql = $sql . $talude->getNat() . "','";
        $sql = $sql . $talude->getAltura() . "','";
        $sql = $sql . $talude->getInclin() . "','";
        $sql = $sql . $talude->getTipo() . "','";
        $sql = $sql . $talude->getSentido() . "','";
        $sql = $sql . $talude->getNbanq() . "','";
        $sql = $sql . $talude->GetAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Alterar($talude) {
        $sql = "UPDATE tbl_talude SET alt = '" . $talude->getAlt() .
                "',reg = '" . $talude->getReg() .
                "',id_estrada = '" . $talude->getId_estrada() .
                "',data = '" . $talude->getData() .
                "',hora = '" . $talude->getHora() .
                "',pkinicio = '" . $talude->getPkinicio() .
                "',lat_ci = '" . $talude->getLat_ci() .
                "',lat_ni = '" . $talude->getLat_ni() .
                "',long_ci = '" . $talude->getLong_ci() .
                "',long_ni = '" . $talude->getLong_ni() .
                "',pkfim = '" . $talude->getPkfim() .
                "',altitd_pki = '" . $talude->getAltitd_pki() .
                "',lat_cf = '" . $talude->getLat_cf() .
                "',lat_nf = '" . $talude->getLat_nf() .
                "',long_cf = '" . $talude->getLong_cf() .
                "',long_nf = '" . $talude->getLong_nf() .
                "',nat = '" . $talude->getNat() .
                "',altura = '" . $talude->getAltura() .
                "',inclin = '" . $talude->getInclin() .
                "',tipo = '" . $talude->getTipo() .
                "',sentido = '" . $talude->getSentido() .
                "',nbanq = '" . $talude->getNbanq() .
                "',ass = '" . $talude->GetAss() . "'WHERE id_talude =" . $talude->GetId_talude();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($talude) {
        $sql = "DELETE FROM tbl_talude WHERE id_talude = $talude";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($talude) {
        $sql = "SELECT * FROM tbl_talude WHERE tipo like '%" . $talude . "%'AND data = CURDATE() ORDER BY pkinicio"; 
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabTalude($talude) {
        $sql = "SELECT * FROM tbl_talude WHERE id_estrada = '$talude' AND data < CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function TabTaludeEmCurso() {
        $sql = "SELECT * FROM tbl_talude WHERE data = CURDATE() AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function CarregaTalude($cod) {
        $sql = "SELECT * FROM tbl_talude WHERE id_talude = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $talude = new Talude($registo['id_talude'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],
                $registo['altitd_pki'], $registo['lat_ci'], $registo['lat_ni'], $registo['long_ci'], $registo['long_ni'],
                $registo['pkfim'], $registo['altitd_pkf'], $registo['lat_cf'], $registo['lat_nf'], $registo['long_cf'], $registo['long_nf'],
                $registo['nat'], $registo['altura'], $registo['inclin'], $registo['tipo'],$registo['sentido'],$registo['nbanq'], $registo['ass']);
        $this->conexao->desconectar();
        return $talude;
    }
      public function ListaEstradas() {
        $sql = "SELECT tbl_talude.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_talude INNER JOIN tbl_estrada ON tbl_talude.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_talude.alt = 0 AND tbl_talude.arq = 0
        GROUP BY tbl_talude.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TaludesComBanquetas() {
        $sql = "SELECT tbl_talude.id_talude, tbl_talude.id_estrada, tbl_estrada.codigo, tbl_estrada.toponimo, tbl_talude.pkinicio, tbl_talude.pkfim, tbl_talude.tipo, tbl_talude.nbanq, tbl_talude.sentido
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_talude.nbanq > 0 AND tbl_talude.alt = 0 AND tbl_talude.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     
     //----------------------------RECTIFICAR--------------------------------------------------
     public function CarregaTaludeRect($cod) {
        $sql = "SELECT * FROM tbl_talude WHERE id_talude = '$cod'";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $talude = new Talude($registo['id_talude'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],
                $registo['altitd_pki'], $registo['lat_ci'], $registo['lat_ni'], $registo['long_ci'], $registo['long_ni'],
                $registo['pkfim'], $registo['altitd_pkf'], $registo['lat_cf'], $registo['lat_nf'], $registo['long_cf'], $registo['long_nf'],
                $registo['nat'], $registo['altura'], $registo['inclin'], $registo['tipo'],$registo['sentido'],$registo['nbanq'], $registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $talude;
    }
     public function LocalizarRect($talude) {
        $sql = "SELECT * FROM tbl_talude WHERE id_estrada = '$talude' AND arq = 0"; 
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($talude) {
        $sql = "UPDATE tbl_talude SET alt = '" . $talude->getAlt() .
                "',reg = '" . $talude->getReg() .
                "',id_estrada = '" . $talude->getId_estrada() .
                "',data = '" . $talude->getData() .
                "',hora = '" . $talude->getHora() .
                "',pkinicio = '" . $talude->getPkinicio() .
                "',lat_ci = '" . $talude->getLat_ci() .
                "',lat_ni = '" . $talude->getLat_ni() .
                "',long_ci = '" . $talude->getLong_ci() .
                "',long_ni = '" . $talude->getLong_ni() .
                "',pkfim = '" . $talude->getPkfim() .
                "',altitd_pki = '" . $talude->getAltitd_pki() .
                "',lat_cf = '" . $talude->getLat_cf() .
                "',lat_nf = '" . $talude->getLat_nf() .
                "',long_cf = '" . $talude->getLong_cf() .
                "',long_nf = '" . $talude->getLong_nf() .
                "',nat = '" . $talude->getNat() .
                "',altura = '" . $talude->getAltura() .
                "',inclin = '" . $talude->getInclin() .
                "',tipo = '" . $talude->getTipo() .
                "',sentido = '" . $talude->getSentido() .
                "',nbanq = '" . $talude->getNbanq() .
                "',arq = '" . $talude->getArq() .
                "',data_arq = '" . $talude->GetData_arq(). "'WHERE id_talude =" . $talude->GetId_talude();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
     //------------------------------------ EXCEL --------------------------------
    
      public function ExportExcelTaludes(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_talude.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_talude.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_talude.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_talude.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_talude.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_talude.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_talude.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
       $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_talude.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_talude.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_talude.*
        FROM tbl_estrada INNER JOIN tbl_talude ON tbl_estrada.id_estrada = tbl_talude.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_talude.arq = 0";
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
