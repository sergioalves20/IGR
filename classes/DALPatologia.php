<?php

require_once 'Conexao.php';
require_once 'Patologia.php';

class DALPatologia {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($patolog) {

        $sql = "INSERT INTO tbl_patologias (alt,reg, id_estrada, data, hora, pkinicio, altitd_pki,lat_ci,lat_ni,long_ci,long_ni, pkfim,altitd_pkf,lat_cf,lat_nf,long_cf,long_nf,grupo,id_talude,banq,via, brm, sobra, pass, sentido, id_item, foto1, foto2, ass)VALUES('";
        $sql = $sql . $patolog->GetAlt() . "','";    
        $sql = $sql . $patolog->GetReg() . "','"; 
        $sql = $sql . $patolog->GetId_estrada() . "','";
        $sql = $sql . $patolog->GetData() . "','";
        $sql = $sql . $patolog->GetHora() . "','";
        $sql = $sql . $patolog->GetPkinicio() . "','";
        $sql = $sql . $patolog->getAltitd_pki() . "','";
        $sql = $sql . $patolog->getLat_ci() . "','";
        $sql = $sql . $patolog->getLat_ni() . "','";
        $sql = $sql . $patolog->getLong_ci() . "','";
        $sql = $sql . $patolog->getLong_ni() . "','";
        $sql = $sql . $patolog->getPkfim() . "','";
        $sql = $sql . $patolog->getAltitd_pkf() . "','";
        $sql = $sql . $patolog->getLat_cf() . "','";
        $sql = $sql . $patolog->getLat_nf() . "','";
        $sql = $sql . $patolog->getLong_cf() . "','";
        $sql = $sql . $patolog->getLong_nf() . "','";
        $sql = $sql . $patolog->getGrupo() . "','";
        $sql = $sql . $patolog->getId_talude() . "','";
        $sql = $sql . $patolog->getBanq() . "','";
        $sql = $sql . $patolog->getVia() . "','";
        $sql = $sql . $patolog->getBrm() . "','";
        $sql = $sql . $patolog->getSobra() . "','";
        $sql = $sql . $patolog->getPass() . "','";
        $sql = $sql . $patolog->getSentido() . "','";
        $sql = $sql . $patolog->getId_item() . "','";
        $sql = $sql . $patolog->getFoto1() . "','";
        $sql = $sql . $patolog->getFoto2() . "','";
        $sql = $sql . $patolog->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($patolog) {

        $sql = "UPDATE tbl_patologias SET alt = '" . $patolog->getAlt() .
                "',reg = '" . $patolog->getReg() .
                "',id_estrada = '" . $patolog->getId_estrada() .
                "',data = '" . $patolog->getData() .
                "',hora = '" . $patolog->getHora() .
                "',pkinicio = '" . $patolog->getPkinicio() .
                "',altitd_pki = '" . $patolog->getAltitd_pki() .  
                "',lat_ci = '" . $patolog->getLat_ci() .
                "',lat_ni = '" . $patolog->getLat_ni() .
                "',long_ci = '" . $patolog->getLong_ci() .
                "',long_ni = '" . $patolog->getLong_ni() .
                "',pkfim = '" . $patolog->getPkfim() . 
                "',altitd_pkf = '" . $patolog->getAltitd_pkf() . 
                "',lat_cf = '" . $patolog->getLat_cf() . 
                "',lat_nf = '" . $patolog->getLat_nf() . 
                "',long_cf = '" . $patolog->getLong_cf() .
                "',long_nf = '" . $patolog->getLong_nf() .
                "',grupo = '" . $patolog->getGrupo() .
                "',id_talude = '" . $patolog->getId_talude() .
                "',banq = '" . $patolog->getBanq() .
                "',via = '" . $patolog->getVia() .
                "',brm = '" . $patolog->getBrm() .
                "',sobra = '" . $patolog->getSobra() .
                "',pass = '" . $patolog->getPass() .
                "',sentido = '" . $patolog->getSentido() .
                "',id_item = '" . $patolog->getId_item() .
                "',foto1 = '" . $patolog->getFoto1() .
                "',foto2 = '" . $patolog->getFoto2() .
                "',ass = '" . $patolog->GetAss() . "'WHERE id_patolog =" . $patolog->GetId_patolog();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($patolog) {
        $sql = "DELETE FROM tbl_patologias WHERE id_patolog = $patolog";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_patologias WHERE  data = CURDATE() ORDER BY pkinicio ";

        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function LocalizarEstrada() {    
        $sql = "SELECT * FROM tbl_patologias WHERE  data < CURDATE() ORDER BY pkinicio";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabPatologias($patolog) {
        $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo, tbl_estrada.ilha, tbl_patologiaitens.nivel
        FROM tbl_patologiaitens INNER JOIN (tbl_estrada INNER JOIN tbl_patologias ON tbl_estrada.id_estrada = tbl_patologias.id_estrada) ON tbl_patologiaitens.id_item = tbl_patologias.id_item
        WHERE tbl_patologias.id_estrada = '$patolog' AND tbl_patologias.alt = 0 AND tbl_patologias.arq = 0 ORDER BY tbl_patologias.pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaPatologias($cod) {
        $sql = "SELECT * FROM tbl_patologias WHERE id_patolog = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $patolog = new Patologia($registo['id_patolog'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],
                $registo['altitd_pki'], $registo['lat_ci'], $registo['lat_ni'], $registo['long_ci'], $registo['long_ni'],
                $registo['pkfim'], $registo['altitd_pkf'], $registo['lat_cf'], $registo['lat_nf'], $registo['long_cf'], $registo['long_nf'],
                $registo['grupo'],$registo['id_talude'],$registo['banq'],$registo['via'], $registo['brm'],$registo['sobra'],$registo['pass'],$registo['sentido'],$registo['id_item'],$registo['foto1'],$registo['foto2'], $registo['ass']);
        $this->conexao->desconectar();
        return $patolog;
    }

      public function ListaEstradas() {
        $sql = "SELECT tbl_patologias.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_patologias INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_patologias.alt = 0 AND tbl_patologias.arq = 0
        GROUP BY tbl_patologias.id_estrada ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Selecionar($item) {
        $sql = "SELECT * FROM tbl_patologiaitens WHERE id_item ='$item'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
   
    //----------------------- RECTIFICAR --------------------------------------------
     public function CarregaPatologiasRect($cod) {
        $sql = "SELECT * FROM tbl_patologias WHERE id_patolog = '$cod'";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();         
        $patolog = new Patologia($registo['id_patolog'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'],
                $registo['altitd_pki'], $registo['lat_ci'], $registo['lat_ni'], $registo['long_ci'], $registo['long_ni'],
                $registo['pkfim'], $registo['altitd_pkf'], $registo['lat_cf'], $registo['lat_nf'], $registo['long_cf'], $registo['long_nf'],
                $registo['grupo'],$registo['id_talude'],$registo['banq'],$registo['via'], $registo['brm'],$registo['sobra'],$registo['pass'],$registo['sentido'],$registo['id_item'],$registo['foto1'],$registo['foto2'], $registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $patolog;
        
    }
      public function LocalizarRect($patalog) {
        $sql = "SELECT * FROM tbl_patologias WHERE  id_estrada = '$patalog' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function Rectificar($patolog) {
        $sql = "UPDATE tbl_patologias SET alt = '" . $patolog->getAlt() .
                "',reg = '" . $patolog->getReg() .
                "',id_estrada = '" . $patolog->getId_estrada() .
                "',data = '" . $patolog->getData() .
                "',hora = '" . $patolog->getHora() .
                "',pkinicio = '" . $patolog->getPkinicio() .
                "',altitd_pki = '" . $patolog->getAltitd_pki() .  
                "',lat_ci = '" . $patolog->getLat_ci() .
                "',lat_ni = '" . $patolog->getLat_ni() .
                "',long_ci = '" . $patolog->getLong_ci() .
                "',long_ni = '" . $patolog->getLong_ni() .
                "',pkfim = '" . $patolog->getPkfim() . 
                "',altitd_pkf = '" . $patolog->getAltitd_pkf() . 
                "',lat_cf = '" . $patolog->getLat_cf() . 
                "',lat_nf = '" . $patolog->getLat_nf() . 
                "',long_cf = '" . $patolog->getLong_cf() .
                "',long_nf = '" . $patolog->getLong_nf() .
                "',grupo = '" . $patolog->getGrupo() .
                "',id_talude = '" . $patolog->getId_talude() .
                "',banq = '" . $patolog->getBanq() .
                "',via = '" . $patolog->getVia() .
                "',brm = '" . $patolog->getBrm() .
                "',sobra = '" . $patolog->getSobra() .
                "',pass = '" . $patolog->getPass() .
                "',sentido = '" . $patolog->getSentido() .
                "',id_item = '" . $patolog->getId_item() .
                "',foto1 = '" . $patolog->getFoto1() .
                "',foto2 = '" . $patolog->getFoto2() .
                "',arq = '" . $patolog->getArq() .
                "',data_arq = '" . $patolog->getData_arq(). "'WHERE id_patolog =" . $patolog->getId_patolog();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
         
    }
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelPatologias(){
        $sql = "SELECT tbl_estrada.ilha, tbl_estrada.codigo,tbl_tbl_patologias.*
        FROM tbl_estrada INNER JOIN tbl_patologias ON tbl_estrada.id_estrada = tbl_patologias.id_estrada
        WHERE tbl_patologias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
         $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_patologias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
          $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_patologias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_patologias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Sal' AND tbl_patologias.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_patologias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
         $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Maio' AND tbl_patologias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Santiago' AND tbl_patologias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Fogo' AND tbl_patologias.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_patologias.*, tbl_estrada.codigo,tbl_estrada.ilha, tbl_patologiagrupo.grupo, tbl_patologiaitens.patologia, tbl_patologiaitens.descr
         FROM (tbl_patologias INNER JOIN (tbl_patologiaitens
         INNER JOIN tbl_patologiagrupo ON tbl_patologiaitens.id_grupo = tbl_patologiagrupo.id_grupo)ON tbl_patologias.id_item = tbl_patologiaitens.id_item)
         INNER JOIN tbl_estrada ON tbl_patologias.id_estrada = tbl_estrada.id_estrada
         WHERE tbl_estrada.ilha = 'Brava' AND tbl_patologias.arq = 0";
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
